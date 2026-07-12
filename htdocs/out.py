import threading
import time
import subprocess
from flask import Flask, render_template, request, jsonify
from flask_socketio import SocketIO, emit
import cv2
from pyzbar.pyzbar import decode
import mysql.connector
import pyttsx3
import winsound
from datetime import datetime
from flask_cors import CORS
# Connect to the MySQL database

app = Flask(__name__)
CORS(app)

socketio = SocketIO(app)

scanning_running=False

conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="paccapro"
)
cursor = conn.cursor()

scanned_qcodes = set()

# Dictionary to store product names associated with qcodes
product_qcode_mapping = {}

try:
    # Execute the SQL query to select order_id from the sales_no table
    cursor.execute("SELECT order_id FROM sales_no")

    # Fetch all the rows
    rows = cursor.fetchall()

    # Loop through the fetched order_ids
    for row in rows:
        order_id = row[0]

        # Execute the SQL query to select products from sales_order table
        cursor.execute("SELECT product FROM sales_order WHERE order_id = %s", (order_id,))

        # Fetch all the products associated with the order_id
        products = cursor.fetchall()

        # Print the products associated with the order
        print(f"Products for Order ID {order_id}:")
        for product in products:
            product_name = product[0]

            # Execute the SQL query to select pro_code from products table
            cursor.execute("SELECT pro_code FROM products WHERE Product = %s", (product_name,))

            # Fetch the pro_code associated with the product
            pro_code = cursor.fetchone()

            # Print the product name
            print(f"Product Name: {product_name}")

            # Store product name associated with qcodes
            if pro_code:
                pro_code_value = pro_code[0]

                # Execute the SQL query to select qcode from pp_in table
                cursor.execute("SELECT qcode FROM pp_in WHERE SUBSTRING(qcode, 1, 26) = %s", (pro_code_value,))
                matched_qcodes = [qcode[0] for qcode in cursor.fetchall()]

                # Store the product name associated with matched qcodes
                for qcode in matched_qcodes:
                    product_qcode_mapping[qcode] = product_name

                # Print the matched qcodes
                print("Matched qcodes:")
                for qcode in matched_qcodes:
                    print(qcode)

            # Print a separator
            print("-" * 30)

except mysql.connector.Error as err:
    print("Error: {}".format(err))

# Function to fetch processed and pending rows for a product from sales_order table
def fetch_processed_and_pending(product_name):
    cursor.execute("SELECT * FROM sales_order WHERE product = %s", (product_name,))
    rows = cursor.fetchall()
   
    processed = 0
    pending = 0
   
    for row in rows:
        processed += row[7]  # Adding processed quantity
        pending += row[8]    # Adding pending quantity
   
    print(f"Product Found: {product_name}")
    print(f"pending: {pending}")
    print(f"processed: {processed}")

# Function to fetch and print the quantity of a product from the stock table
def fetch_product_quantity(product_name):
    try:
        # Execute SQL query to select quantity of the product from the stock table
        cursor.execute("SELECT qty FROM stock WHERE products = %s", (product_name,))
        row = cursor.fetchone()
       
        if row:
            quantity = row[0]
            print(f"Product Found: {product_name}")
            print(f"Quantity in stock: {quantity}")
        else:
            print(f"Product {product_name} not found in stock.")
           
    except mysql.connector.Error as err:
        print("Error: {}".format(err))

# Function to update processed and pending counts, decrement stock quantity, add scanned QR code with timestamp to pp_out table
# Function to update processed and pending counts, decrement stock quantity, add scanned QR code with timestamp to pp_out table
def update_processed_and_pending(product_name, qcode, order_id):
    try:
        if product_name:
            cursor.execute("SELECT flag FROM pp_in WHERE qcode = %s", (qcode,))
            flag = cursor.fetchone()
            cursor.execute("SELECT COUNT(*) FROM sales_order WHERE order_id = %s AND pending > 0", (order_id,))
            pending_count = cursor.fetchone()[0]


            cursor.execute("SELECT pending FROM sales_order WHERE order_id = %s AND product = %s", (order_id, product_name))
            pending_result = cursor.fetchone()
            pending_count1 = pending_result[0] if pending_result else 0

                # If no products are pending, mark the order as fully processed in order_details
            if pending_count == 0:
                    cursor.execute("UPDATE order_details SET status = 1 WHERE order_id = %s", (order_id,))
                    conn.commit()
                    print(f"All products processed for order {order_id}. Status updated to 1 in order_details.")
                    
            if flag and flag[0] == 1:
                print("This product has already been delivered. No updates to stock.")
            elif(pending_count1>0):
                # Update processed and pending counts in sales_order table
                cursor.execute("UPDATE sales_order SET processed = processed + 1, pending = pending - 1 WHERE order_id = %s AND product = %s", (order_id, product_name))
                conn.commit()

                trimmed_product_name = product_name.strip()

                # Fetch the 'cont' value from the box_count table after trimming spaces in both input and database
                cursor.execute("SELECT cont FROM box WHERE TRIM(item) = %s", (trimmed_product_name,))
                cont_result = cursor.fetchone()
                # Decrement stock quantity
                # cursor.execute("UPDATE stock SET qty = qty - 1 WHERE products = %s", (product_name,))
                # conn.commit()

                if cont_result:
                    cont_value = cont_result[0]

                    # Reduce stock quantity based on 'cont' value
                    cursor.execute("UPDATE stock SET qty = qty - %s WHERE TRIM(products) = %s", (cont_value, trimmed_product_name))
                    conn.commit()

                # Get current timestamp
                timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')

                # Insert scanned QR code with timestamp and order_id into pp_out table
                cursor.execute("INSERT INTO pp_out (qcode, timestamp, order_id) VALUES (%s, %s, %s)", (qcode, timestamp, order_id))
                conn.commit()

                # Update flag in pp_in table to mark as delivered
                cursor.execute("UPDATE pp_in SET flag = 1 WHERE qcode = %s", (qcode,))
                conn.commit()
               
                print("Updated processed and pending counts, decremented stock quantity, added scanned QR code with timestamp and order_id to pp_out table, and updated flag in pp_in table.")
                fetch_product_quantity(product_name)  # Fetch and print quantity from stock table

               

        else:
            # Product not found, mark order as mishandled
            timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            cursor.execute("INSERT INTO pp_out (qcode, timestamp, order_id) VALUES (%s, %s, 'mishandled')", (qcode, timestamp))
            conn.commit()
            print("Product Not Found, marked order as mishandled in pp_out table.")
            socketio.emit('gif_trigger', {'value': 0})
       
    except mysql.connector.Error as err:
        print("Error: {}".format(err))

# Set to store scanned QR codes
scanned_qcodes = set()
def scan_qr_code():
    # Open the camera
    cap = cv2.VideoCapture(0)

    while True:
        # Capture frame-by-frame
        ret, frame = cap.read()

        # Convert frame to grayscale
        gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

        # Decode QR codes
        decoded_objects = decode(gray)

        # If QR code is found
        if decoded_objects:
            for obj in decoded_objects:
                data = obj.data.decode('utf-8')
                if data in scanned_qcodes:
                    # Repeat beep for already scanned codes
                    winsound.Beep(500, 300)  # Lower frequency, shorter duration
                    print("QR code already verified:", data)
                    socketio.emit('gif_trigger', {'value': 0})

                    continue
                if data in product_qcode_mapping and data not in scanned_qcodes:
                    product_name = product_qcode_mapping[data]
                    scanned_qcodes.add(data)
                    # Check if the flag is already set in pp_in table
                    cursor.execute("SELECT flag FROM pp_in WHERE qcode = %s", (data,))
                    flag = cursor.fetchone()
                    if flag and flag[0] == 1:
                        print("Product already delivered. No further action taken:", product_name)
                        socketio.emit('gif_trigger', {'value': 0})
                    else:
                        

                        cursor.execute("SELECT pending FROM sales_order WHERE order_id = %s AND product = %s", (order_id, product_name))
                        pending_result = cursor.fetchone()
                        pending_count1 = pending_result[0] if pending_result else 0
                        if(pending_count1>0):
                            update_processed_and_pending(product_name, data, order_id)  # Update counts, decrement stock, log QR
                            fetch_processed_and_pending(product_name)  # Print updated values
                            print("Correctly handled product detected and processed:", product_name)
                            socketio.emit('gif_trigger', {'value': 1})
                        else:
                            socketio.emit('gif_trigger', {'value': 0})

                        time.sleep(1.5) 
                        
			            
                else:
                    # Product not found, mark order as mishandled
                    timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
                    cursor.execute("INSERT INTO pp_out (qcode, timestamp, order_id) VALUES (%s, %s, 'mishandled')", (data, timestamp))
                    conn.commit()
                    scanned_qcodes.add(data)
                    # Print and beep for mishandled products
                    print("Mishandled product detected and recorded:", data)
                    winsound.Beep(1000, 800)  # Distinctively different sound
                    socketio.emit('gif_trigger', {'value': 0})
		   
        # Display the resulting frame
        cv2.imshow('OUT', frame)

        # Wait for 'q' key to quit
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

    # When everything is done, release the capture
    cap.release()
    cv2.destroyAllWindows()

def fetch_sales_order_data():
    cursor.execute("SELECT * FROM sales_order")
    rows = cursor.fetchall()
    for row in rows:
        data = {
            'order_id': row[0],
            'product': row[1],
            'processed': row[7],
            'pending': row[8]
            # Add more fields as needed
        }
        socketio.emit('sales_order_data', data)

# SocketIO event to start fetching and emitting sales order data
@socketio.on('start_fetching_data')
def start_fetching_data():
    fetch_sales_order_data()


# Route to start the scanning process
@app.route('/start_scanning', methods=['POST'])
def start_scan_qr():
    global scanning_running
    if not scanning_running:
        scan_qr_code()
        return jsonify({'message': 'Scanning started.'}), 200
    else:
        return jsonify({'message': 'Scanning already in progress.'}), 400

# Route to stop the scanning process
@app.route('/stop_scanning', methods=['POST'])
def stop_scanning_route():
    global scanning_running
    try:
        if scanning_running:
            scanning_running = False
            return jsonify({'message': 'Scanning stopped.'}), 200
        else:
            return jsonify({'message': 'Scanning not running.'}), 400
    except Exception as e:
        print(f"Error stopping scanning: {str(e)}")
        return jsonify({'error': 'Internal Server Error'}), 500

# Route to serve the index.html page
@app.route('/')
def index():
    return render_template('outmodel.html')

if __name__ == "__main__":
    socketio.run(app, debug=True, port=5001)
