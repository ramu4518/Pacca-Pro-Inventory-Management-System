<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./style.css">
    <title>Dashboard</title>
    <style>
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 0.1px;
            margin-right:10px;
        }
        .error-message {
            color: red;
            font-weight: bold;
            display: none;
        }
    #submit-btn {
        background-color: blue;
        color: white;
        border: none;
    }

    #submit-btn:hover {
        background-color: darkblue;
    }
</style>

        
        
    </style>
</head>
<body id="body-pd">
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
</header>
<?php include 'navbar.html'; ?>
<main>
    <center><h4>Packaging</h4></center>
    <div>
        <label for="date_select">Select Date:</label>
        <select id="date_select" placeholder="Select the date">
            <option value="" selected disabled>Select the date</option>
            <?php
            // Connect to your database
            // Include the database connection file
            include 'db_connect.php'; // This replaces the previous database connection code

            // Initialize an error message variable
            $_SESSION['error'] = '';

            // Fetch dates where status is 0
            $sql = "SELECT DISTINCT DATE(date_added) AS distinct_date FROM production WHERE status = 0";
            $result = $conn->query($sql);

            // Populate dropdown with distinct dates
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $formatted_date = $row['distinct_date'];
                    echo "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
                }
            }

            // Close connection
            $conn->close();
            ?>
        </select>
    </div>
</main>
<div id="tables-container"></div>
<button id="submit-btn" class="btn btn-primary">Submit</button>
<script src="./script.js"></script>
<script>
// Initialize an object to store parent product values for each date
var parentProducts = {};

function generateParentProducts(data) {
    data.forEach(function(item) {
        generateTable(item);
    });
}

// Function to toggle visibility of products for a parent product
function toggleProductVisibility(parentProduct) {
    var productsDiv = document.getElementById(parentProduct + '-products');
    productsDiv.style.display = productsDiv.style.display === 'none' ? 'block' : 'none';
}

// Function to generate products for a parent product
function generateProducts(products, container) {
    var tableHTML = '<table border="1"><tr><th>Product</th><th>Quantity</th><th>Total</th></tr>';
    products.forEach(function(product) {
        tableHTML += '<tr>';
        tableHTML += '<td>' + product + '</td>';
        tableHTML += '<td><input type="number" id="' + product + '-quantity" value="0" min="0"></td>';
        tableHTML += '<td id="' + product + '-total">0</td>';
        tableHTML += '</tr>';
    });
    tableHTML += '</table>';
    container.innerHTML = tableHTML;

    // Add event listeners to input boxes to calculate and display the total
    products.forEach(function(product) {
        var inputBox = document.getElementById(product + '-quantity');
        inputBox.addEventListener('input', function() {
            calculateAndDisplayTotal(products);
        });
    });
}

document.getElementById('date_select').addEventListener('change', function() {
    var selectedDate = this.value;
    if (selectedDate) {
        // Make an AJAX request to fetch the parent_product for the selected date
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'AJAX/fetch_parent_product.php?date=' + selectedDate, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the JSON response
                var data = JSON.parse(xhr.responseText);
                // Generate tables for each parent product
                generateParentProducts(data);

                // Call calculateAndDisplayTotal and addQuantityEventListeners for each parent product
                data.forEach(function(item) {
                    var parentProduct = item.parent_product;
                    var products = item.products;
                    var totalWeight = item.total_weight;
                    calculateAndDisplayTotal(products, parentProduct, totalWeight);
                    addQuantityEventListeners(products, parentProduct, totalWeight);
                });
            }
        };
        xhr.send();
    }
});

function generateTable(item) {
    var tableHTML = '<h2>' + item.parent_product + ' (Total Weight: ' + item.total_weight + ')</h2>';
    tableHTML += '<div class="error-message" id="' + item.parent_product.replace(/\s+/g, '-').toLowerCase() + '-error-message">Invalid Total weight for this parent product.</div>';
    tableHTML += '<table border="1"><tr><th>Product</th><th>Quantity</th><th>Total</th></tr>';
    item.products.forEach(function(product) {
        tableHTML += '<tr>';
        tableHTML += '<td>' + product.name + '</td>';
        tableHTML += '<td><input type="number" id="' + product.name.replace(/\s+/g, '-').toLowerCase() + '-quantity" value="0" min="0"></td>';
        tableHTML += '<td id="' + product.name.replace(/\s+/g, '-').toLowerCase() + '-total">0</td>';
        tableHTML += '</tr>';
    });
    // Add row for total with a unique identifier based on parent product name
    tableHTML += '<tr><td><b>Total:</b></td><td colspan="2" id="' + item.parent_product.replace(/\s+/g, '-').toLowerCase() + '-total">0</td></tr>';
    // Add single wastage input row below the total row
    tableHTML += '<tr><td><b>Wastage:</b></td><td colspan="2"><input type="number" id="' + item.parent_product.replace(/\s+/g, '-').toLowerCase() + '-wastage" value="0" min="0"></td></tr>';
    tableHTML += '</table>';
    // Append the generated table to a container element (e.g., div with id "tables-container")
    document.getElementById('tables-container').innerHTML += tableHTML;

    // Store the product data in the parentProducts object
    parentProducts[item.parent_product] = {
        products: item.products,
        totalWeight: item.total_weight
    };
}

var errorMessages = {};

// Function to calculate and display the total
function calculateAndDisplayTotal(products, parentProduct, totalWeight) {
    var total = 0;
    var wastage = parseInt(document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-wastage').value || 0);
    var errorMessage = document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-error-message');
    products.forEach(function(product) {
        var inputBox = document.getElementById(product.name.replace(/\s+/g, '-').toLowerCase() + '-quantity');
        var weightDimension = product.weight_dimension;
        var productTotal = parseInt(inputBox.value || 0) * weightDimension; // Calculate product total
        total += productTotal; // Add product total to the overall total
        
        // Update the product total in the table
        document.getElementById(product.name.replace(/\s+/g, '-').toLowerCase() + '-total').textContent = productTotal;
    });

    // Display total within the table using the unique identifier
    var totalElement = document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-total');
    totalElement.textContent = total;

    // Check if the total exceeds the total_weight
    if ((total > totalWeight || total < totalWeight) && total !== 0) {
        errorMessage.style.display = 'block'; // Show the error message
        errorMessages[parentProduct] = true; // Set the error message flag for the parent product
    } else {
        errorMessage.style.display = 'none'; // Hide the error message
        errorMessages[parentProduct] = false; // Set the error message flag for the parent product to false
    }

    // Example of disabling submit button until all errors are resolved
    var submitBtn = document.getElementById('submit-btn');
    submitBtn.disabled = true;

    // Check if any error messages are visible
    var errorMessagesVisible = Object.values(errorMessages).some(function(error) {
        return error;
    });

    // Enable submit button if no error messages are visible
    if (!errorMessagesVisible) {
        submitBtn.disabled = false;
    }
}

function addQuantityEventListeners(products, parentProduct, totalWeight) {
    products.forEach(function(product) {
        var inputBox = document.getElementById(product.name.replace(/\s+/g, '-').toLowerCase() + '-quantity');
        inputBox.addEventListener('input', function() {
            calculateAndDisplayTotal(products, parentProduct, totalWeight);
        });
    });
    var wastageBox = document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-wastage');
    wastageBox.addEventListener('input', function() {
        calculateAndDisplayTotal(products, parentProduct, totalWeight);
    });
}
document.getElementById('submit-btn').addEventListener('click', function() {
    var selectedDate = document.getElementById('date_select').value;
    var packagingData = [];

    // Loop through each parent product
    Object.keys(parentProducts).forEach(function(parentProduct) {
        var products = parentProducts[parentProduct].products;
        var wastage = parseInt(document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-wastage').value) || 0;

        // Check if there is an error message for this parent product
        if (!errorMessages[parentProduct]) {
            var totalQuantity = 0;

            // Loop through each product of the parent product
            products.forEach(function(product) {
                var quantity = parseInt(document.getElementById(product.name.replace(/\s+/g, '-').toLowerCase() + '-quantity').value) || 0;
                totalQuantity += quantity;

                // Add product data to packagingData array if quantity is greater than 0
                if (quantity > 0) {
                    packagingData.push({
                        parent_product: parentProduct,
                        product_name: product.name,
                        quantity: quantity,
                        wastage:wastage,
                        date_added: selectedDate
                        
                    });
                }
            });

            // Only update stock and production status if there's any quantity or wastage
            if (totalQuantity > 0 || wastage > 0) {
                // Update stock quantities
                products.forEach(function(product) {
                    var quantity = parseInt(document.getElementById(product.name.replace(/\s+/g, '-').toLowerCase() + '-quantity').value) || 0;
                    if (quantity > 0) {
                        updateStockQuantity(product.name, quantity);
                    }
                });

                // Update production status (including wastage)
                updateProductionStatus(parentProduct, selectedDate);
            }
        }
    });


    // Ensure at least one valid entry is present before submission
    if (packagingData.length > 0) {
        // Make an AJAX request to send packagingData to the server
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'AJAX/submit_packaging_data.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Data submitted sucessfully');
                console.log(xhr.responseText);
                // Optionally, clear input fields or reset the form
               location.reload(); 
            } else {
                alert('Error submitting data');
            }
        };
        xhr.send(JSON.stringify(packagingData));
    } else {
        alert('Please ensure the total weight matches the expected weight for at least one parent product.');
    }
});

function updateProductionStatus(parentProduct, selectedDate) {
    // Get wastage value for the parent product
    var wastage = parseInt(document.getElementById(parentProduct.replace(/\s+/g, '-').toLowerCase() + '-wastage').value) || 0;

    // Make an AJAX request to update the status and wastage of the parent product
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_production_status.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
    if (xhr.status == 200) {
        console.log('Status and wastage updated successfully');
        console.log(xhr.responseText); // Log the response for debugging
    } else {
        console.error('Error updating status and wastage');
        console.error(xhr.responseText); // Log the error response
    }
};

    var requestData = {
        parent_product: parentProduct,
        date_added: selectedDate,
        wastage: wastage
    };

    console.log('Sending update request:', requestData); // Log the data being sent
    xhr.send(JSON.stringify(requestData));
}

function updateStockQuantity(productName, quantity) {
    console.log('Updating stock quantity for:', productName, 'with quantity:', quantity);

    // Make an AJAX request to update the stock quantity
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'AJAX/update_stock_quantity.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Stock quantity updated successfully');
        } else {
            console.error('Error updating stock quantity');
        }
    };
    xhr.send(JSON.stringify({ product_name: productName, quantity: quantity }));
}

</script>
</body>
</html>