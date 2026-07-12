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

app = Flask(__name__)
socketio = SocketIO(app)

# Connect to your MySQL database
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="paccapro"
)
cursor = conn.cursor()

# Initialize text-to-speech engine
#engine = pyttsx3.init()

# Flag to track processed QR codes in the current session
processed_codes = set()

# Flag to track whether the scanning process is running
scanning_running = False

# Function to check if the scanned QR code exists in the "pp_in" table
def is_qr_code_in_pp_in(qcode):
    print("hello1")
    query = f"SELECT COUNT(*) FROM pp_in WHERE qcode = '{qcode}'"
    cursor.execute(query)
    result = cursor.fetchone()[0]
    return result > 0

# Function to insert the QR code into the "pp_in" table
def insert_into_in_table(qcode):
    # Check if the QR code is already present in "pp_in"
    print("insert")
    if is_qr_code_in_pp_in(qcode):
        print("Already inserted")
        winsound.Beep(2000, 800)
        winsound.Beep(2000, 800)
        winsound.Beep(2000, 800) # Frequency = 1000 Hz, Duration = 500 milliseconds
    else:
        # Check if the QR code exists in "qr" table
        query_check_qr = f"SELECT COUNT(*) FROM qr WHERE qcode = '{qcode}'"
        cursor.execute(query_check_qr)
        qr_exists = cursor.fetchone()[0]
       
        if qr_exists > 0:
            print("hello")
            # Get uid corresponding to the qcode from "qr" table
            query_uid = f"SELECT uid FROM qr WHERE qcode = '{qcode}'"
            cursor.execute(query_uid)
            uid = cursor.fetchone()[0]
           
            # Insert into "pp_in" table with qcode, corresponding uid, and flag
            query_insert = f"INSERT INTO pp_in (uid, qcode, flag) VALUES ({uid}, '{qcode}', 0)"
            cursor.execute(query_insert)
            conn.commit()
            print("QR code inserted into 'pp_in' table.")
            
            # Voice alert for successful insertion
            #thread = threading.Thread(target=speak_message, args=("Okay",))
            #thread.start()

            # Update the flag of the QR code in the "qr" table to 1
            query_update_flag = f"UPDATE qr SET flag = 1 WHERE qcode = '{qcode}'"
            cursor.execute(query_update_flag)
            conn.commit()
            print("Flag updated in 'qr' table.")
            query_product_info = f"SELECT product FROM products WHERE pro_code = (SELECT LEFT(qcode, 26) FROM pp_in WHERE qcode = '{qcode}')"
            cursor.execute(query_product_info)
            product_name = cursor.fetchone()[0]
            print("Product Name:", product_name)

            # Retrieve current quantity from "stock" table for the matched product
            query_current_qty = f"SELECT qty FROM stock WHERE products = '{product_name}'"
            cursor.execute(query_current_qty)
            current_qty = cursor.fetchone()
            if current_qty:
                current_qty = current_qty[0]
                
                query_cont = f"SELECT cont FROM box WHERE item = '{product_name}'"
                cursor.execute(query_cont)
                cont_value = cursor.fetchone()
                cont_value = cont_value[0] if cont_value else 0  # Default to 0 if no match

                new_qty = current_qty + cont_value  # Add the retrieved 'cont' value

                query_update_qty = f"UPDATE stock SET qty = {new_qty} WHERE products = '{product_name}'"
                cursor.execute(query_update_qty)
                conn.commit()
                print("Quantity in stock updated:", new_qty)
                socketio.emit('gif_trigger', {'value': 1})
                winsound.Beep(8000, 900)
                update_stock(product_name, new_qty)

            else:
                print("Product not found in stock.")
                socketio.emit('gif_trigger', {'value': 0})


        else:
            # Voice alert for QR code not found
            #thread = threading.Thread(target=speak_message, args=("Not Present",))
            #thread.start()
            print(f"QR code '{qcode}' not found in 'qr' table.")
            socketio.emit('gif_trigger', {'value': 0})

# Function to start the QR code scanning process
def start_scanning():
    global scanning_running
    scanning_running = True
    cap = cv2.VideoCapture(0)

    while scanning_running:
        _, frame = cap.read()
        decoded_objects = decode(frame)

        for obj in decoded_objects:
            qcode = obj.data.decode('utf-8')

            # Check if the QR code has already been processed
            if qcode not in processed_codes:
                #print(f"Scanned QR Code: {qcode}")

                insert_into_in_table(qcode)

                # Add the processed QR code to the set
                processed_codes.add(qcode)

                # Send real-time update to the client
                socketio.emit('qr_code_processed', {'message': f'Scanned QR Code: {qcode}'})
            else:
                winsound.Beep(1000, 800)  # Distinctively different sound
                socketio.emit('gif_trigger', {'value': 0})
        cv2.imshow("QR Code Scanner - IN", frame)

        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

    cap.release()
    cv2.destroyAllWindows()

def update_stock(product_name, new_qty):
    # Update stock table
    query_update_qty = f"UPDATE stock SET qty = {new_qty} WHERE products = '{product_name}'"
    cursor.execute(query_update_qty)
    conn.commit()
    print("Quantity in stock updated:", new_qty)
    winsound.Beep(8000, 900)
    
    # Emit the updated data to the client
    socketio.emit('update_stock', [{'product': product_name, 'quantity': new_qty}])

# Function to speak a message using the text-to-speech engine
#def speak_message(message):
   #engine.say(message)
    #engine.runAndWait()

# Route to start the scanning process
@app.route('/start_scanning', methods=['POST'])
def start_scanning_route():
    global scanning_running
    if not scanning_running:
        start_scanning()
        return jsonify({'message': 'Scanning started.'}), 200
    else:
        return jsonify({'message': 'Scanning already in progress.'}), 400

# Route to stop the scanning process
@app.route('/stop_scanning', methods=['POST'])
def stop_scanning_route():
    global scanning_running
    if scanning_running:
        scanning_running = False
        return jsonify({'message': 'Scanning stopped.'}), 200
    else:
        return jsonify({'message': 'Scanning not running.'}), 400



@app.route('/')
def index():
    return render_template('inmodel.html')

if __name__ == "__main__":
    socketio.run(app, debug=True)
