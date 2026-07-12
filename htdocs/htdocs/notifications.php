<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Dashboard</title>
    <style>
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 15px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        button[name="generate_qr"] {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body id="body-pd">
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="dashboard.php" class="nav_logo"> <img src="assets/img/f-logo.png" alt="Logo" style="height: 40px;"> <span class="nav_logo-name">Pacca Pro</span> </a>
            <div class="nav_list">
                <a href="production.php" class="nav_link"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Production</span> </a>
                <a href="packaging.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Packaging</span></a>
                <a href="notifications.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Notifications</span></a>
            </div>
        </div>
        <a href="index.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">LogOut</span> </a>
    </nav>
</div>
<main>
    <h4>Qr Printouts</h4>
    <form action="" method="post">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Date Inserted</th>
                <th>Select</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Include your database connection code here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "paccapro";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM packaging";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row['qr_status'] == 0){
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>"; // Display quantity
                    echo "<td>" . $row["date_inserted"] . "</td>";
                    echo "<td><input type='checkbox' name='selected_products[]' value='" . $row["id"] . "'></td>";
                    echo "<input type='hidden' name='quantities[]' value='" . $row["quantity"] . "'>";
                    echo "</tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='6'>No products found.</td></tr>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
        <button type="submit" name="generate_qr">Generate QR</button>
    </form>
    <div id="print-content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_qr'])) {
            // Include your database connection code here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "paccapro";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Function to generate a unique QR code by checking for duplicates
            function generateUniqueQRCode($conn, $pro_code, $date_formatted, $index) {
                $qr_code_format = $pro_code . $date_formatted . sprintf('%05d', $index);

                // Check if the QR code already exists in the database
                $check_sql = "SELECT pid FROM qr WHERE qcode = '$qr_code_format'";
                $check_result = $conn->query($check_sql);
                if ($check_result->num_rows > 0) {
                    // If the QR code already exists, recursively call the function with an incremented index
                    return generateUniqueQRCode($conn, $pro_code, $date_formatted, $index + 1);
                } else {
                    // If the QR code is unique, return it
                    return $qr_code_format;
                }
            }

            // Get the selected product IDs and quantities from the form
            $selected_products = $_POST['selected_products'];
            $quantities = $_POST['quantities'];

            // Loop through the selected product IDs
            foreach ($selected_products as $key => $product_id) {
                $quantity = $quantities[$key]; // Get quantity for this product

                // Retrieve the product details from the packaging table
                $sql = "SELECT * FROM packaging WHERE id = $product_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $product_name = $row["product_name"];
                    $date_inserted = $row["date_inserted"];
                    $available_quantity = $row["quantity"]; 

                    // Search for the product code in the products table based on the product name
                    $sql_product = "SELECT id, pro_code FROM products WHERE Product = '$product_name'";
                    $result_product = $conn->query($sql_product);
                    if ($result_product->num_rows > 0) {
                        $row_product = $result_product->fetch_assoc();
                        $pr_id = $row_product["id"];
                        $pro_code = $row_product["pro_code"];

                        // Insert data into qr_master table
                        $date_formatted = date("Y/m/d", strtotime($date_inserted));
                        $batch = 1; // Assuming batch is always 1
                        //$count = $quantity_to_generate;

                        $insert_sql = "INSERT INTO qr_master (pr_code, p_date, batch, count) VALUES ('$pro_code', '$date_formatted', $batch, $available_quantity)";
                        if ($conn->query($insert_sql) === TRUE) {
                            // Insert data into qr table
                            // Display the QR codes
                            echo "<div class='row'>";
                            for ($i = 1; $i <= $available_quantity; $i++) {
                                if (($i - 1) % 2 === 0) {
                                    echo "<div class='row'>";
                                }

                                echo "<div class='col-6'>";
                                echo "<div class='qr-container'>";
                                echo "<div class='qr-code'>";

                                // Generate the QR code format (without time) with appended sequence of 5 digits
                                $qr_code_format = generateUniqueQRCode($conn, $pro_code, $date_formatted, 1);

                                // Insert into qr table
                                $qr_insert_sql = "INSERT INTO qr (uid, pr_id, qcode, flag) VALUES ('$product_id', '$pr_id', '$qr_code_format', 0)";
                                if ($conn->query($qr_insert_sql) !== TRUE) {
                                    echo "Error: " . $qr_insert_sql . "<br>" . $conn->error;
                                }

                                echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$qr_code_format' alt='QR Code for $product_name - $i'>";
                                echo "</div>";
                                echo "<p style='text-align: center; margin-top: 10px;'>$qr_code_format</p>";
                                echo "</div>";
                                echo "</div>";

                                if ($i % 2 === 0 || $i === $available_quantity) {
                                    echo "</div>";
                                }
                            }
                            echo "</div>";
                        } else {
                            echo "Error: " . $insert_sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Product code not found for product: $product_name <br>";
                    }
                } else {
                    echo "Product not found for ID: $product_id <br>";
                }
            }
            if($insert_sql && $qr_insert_sql)
            {
                $update_qr_status_sql = "UPDATE packaging SET qr_status = 1 WHERE id = $product_id";
                if ($conn->query($update_qr_status_sql) !== TRUE) {
                    echo "Error updating qr_status: " . $conn->error;
                }
            }
            $conn->close();
        }
        ?>
        
    </div>
    <br>
    <br>
</main>
<button onclick="printQR()">Print QR Codes</button>

<script>
    function printQR() {
    // Get the print content
    var printContent = document.getElementById('print-content').innerHTML;

    // Check if there are QR codes to print
    if (printContent.trim() === '') {
        alert('No QR codes to print.');
        return;
    }

    // Create a new window for printing
    var printWindow = window.open('', '', 'height=800,width=800');

    // Create a container div to hold the QR codes
    var containerDiv = printWindow.document.createElement('div');
    containerDiv.style.display = 'flex';
    containerDiv.style.flexWrap = 'wrap';
    containerDiv.style.justifyContent = 'center';

    // Extract the QR code elements from the print content
    var qrCodeElements = printContent.match(/<div class="qr-container">[\s\S]*?<p.*?>[\s\S]*?<\/p>[\s\S]*?<\/div>/g);

    // Loop through the QR code elements and add them to the container div
    for (var i = 0; i < qrCodeElements.length; i++) {
        var qrCodeDiv = printWindow.document.createElement('div');
        qrCodeDiv.style.flex = '0 0 50%'; // Set the width to 50% for two QR codes per row
        qrCodeDiv.style.maxWidth = '400px'; // Set a maximum width for the QR code container
        qrCodeDiv.style.padding = '10px'; // Add some padding around the QR code
        qrCodeDiv.style.boxSizing = 'border-box'; // Include padding in the width calculation
        qrCodeDiv.innerHTML = qrCodeElements[i];
        containerDiv.appendChild(qrCodeDiv);
    }

    // Write the container div to the print window
    printWindow.document.write('<html><head><title>Print QR Codes</title></head><body>');
    printWindow.document.body.appendChild(containerDiv);
    printWindow.document.write('</body></html>');

    // Wait for all images to load before printing
    var waitForImages = function() {
        var images = printWindow.document.getElementsByTagName('img');
        var imagesLoaded = 0;
        for (var i = 0; i < images.length; i++) {
            if (images[i].complete) {
                imagesLoaded++;
            } else {
                images[i].addEventListener('load', function() {
                    imagesLoaded++;
                    if (imagesLoaded === images.length) {
                        printWindow.print();
                        printWindow.close();
                    }
                });
            }
        }
        if (imagesLoaded === images.length) {
            printWindow.print();
            printWindow.close();
        }
    };

    waitForImages();
}
</script>
<script src="./script.js"></script>
</body>
</html>