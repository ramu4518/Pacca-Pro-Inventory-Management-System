<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./production.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   
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
        #manualProductRow {
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#manualProductRow select,
#manualProductRow input[type="number"],
#manualProductRow button {
    margin-right: 10px;
    padding: 6px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

#manualProductRow select {
    width: 200px;
}

#manualProductRow input[type="number"] {
    width: 100px;
}
.highlighted-date:not(.flatpickr-disabled) {
            background-color: #e6f3ff;
            border-color: #80bdff;
        }
        .highlighted-date:hover,
        .highlighted-date:focus {
            background-color: #ccebff;
            border-color: #3399ff;
        }
#manualProductRow button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#manualProductRow button:hover {
    background-color: #0056b3;
}





    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <main>
        <h4>Pending Sales Order</h4>
        <div class="input-file-container">
        <input type="file" id="fileInput" accept=".csv, .xlsx" onchange="handleFiles(this.files)">
       <!--- <label for="fetch">Fetch old:</label>
       <input type="date" id="fetch" name="selectedDate" onchange="fetchParentProducts()">-->
       <label for="fetchOldButton"></label>
            <button id="fetchOldButton" class="btn btn-primary" onclick="toggleCalendar()">Fetch old</button>
            <div id="datePickerContainer" style="display: none;">
                <input type="date" id="fetch" name="selectedDate" onchange="fetchParentProducts()">
            </div>

    </div>
    
        <table id="outputTable">
            <thead>
                <tr>
                <th style="width: 80%;">Name of Item</th>
                    <th style="width: 20%;">Total</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="nextButtonContainer"></div>
        
        <div id="productDetails" class="product-details"></div>
        
        <div id="multiplicationResults" class="results-container" style="display:none"></div>
        <div id="productDetails1" class="product-details"></div>
        <table id="fetchedDataTable">
        <!-- Table headers -->
        <thead>
            <tr>
                <th>Name of Item</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div id="manualProductRow" class="product-details">
    <select id="newProductName" class="form-control">
        <!-- Options will be dynamically added here -->
    </select>
    <input type="number" id="newProductTotal" placeholder="Enter total weight">
    <button onclick="addNewProduct()">Add</button>
</div>


</div>

    </main>

    <script>

document.addEventListener('DOMContentLoaded', function() {
    // Call the function to fetch and populate the dropdown when the page loads
    fetchAvailableDates();
    fetchParentProductNames();
});

    // Show the new row for adding a product manually
    document.getElementById('manualProductRow').style.display = 'block';
</script>
    <script>
        const names = [];
        let productDetails = {};
        function handleFiles(files) {
            if (files.length === 0) return;
            const file = files[0];
            if (file.type.includes("spreadsheetml") || file.name.endsWith('.xlsx')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = e.target.result;
                    const workbook = XLSX.read(data, { type: 'binary' });
                    const sheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[sheetName];
                    const json = XLSX.utils.sheet_to_json(worksheet, {header:1});
                    processJson(json); // Transform and display data
                };
                reader.readAsBinaryString(file);
            } else if (file.type === "text/csv" || file.name.endsWith('.csv')) {
                Papa.parse(file, {
                    complete: function(results) {
                        processJson(results.data); // Transform and display data
                    }
                });
            }
        }
        
        function processJson(data) {
            let outputHTML = "";
            let currentItem = "";
            let currentTotal = 0;

            for (let i = 0; i < data.length; i++) {
                const row = data[i];
                if (row.length > 1) {
                    if (row[0] && row[0] !== currentItem && currentItem !== "") {
                        if (currentTotal !== 0) {
                            outputHTML += `<tr><td>${currentItem}</td><td>${currentTotal / 2}</td></tr>`;
                            names.push(currentItem);
                        }
                        currentItem = row[0];
                        currentTotal = parseInt(row[3], 10) || 0;
                    } else if (row[0]) {
                        currentItem = row[0];
                        currentTotal = parseInt(row[3], 10) || 0;
                    } else {
                        currentTotal += parseInt(row[3], 10) || 0;
                    }
                }
            }
            if (currentTotal !== 0) {
                outputHTML += `<tr><td>${currentItem}</td><td>${currentTotal / 2}</td></tr>`;
                names.push(currentItem);
            }
            const tbody = document.querySelector("#outputTable tbody");
            tbody.innerHTML = outputHTML;

            // Create and add the Next button if not already added
            const buttonContainer = document.getElementById("nextButtonContainer");
            if (!buttonContainer.querySelector('button')) {
                const nextButton = document.createElement("button");
                nextButton.textContent = "Next";
                nextButton.className = "btn btn-primary";
                nextButton.onclick = function() {
                    fetch('getProductDetails.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ itemNames: names })
        }).then(response => response.json())
          .then(data => {
              productDetails = {}; // Reset previous details
              data.forEach(product => {
                  productDetails[product.Product] = product.Weight_Dimention;
                  // No display code here, just storage
              });
              multiplyAndDisplay(); // Optionally call other functions if needed right away
              getParentProduct(); // Optionally call other functions if needed right away
          })
          .catch(error => console.error('Error fetching data:', error));
                };
                buttonContainer.appendChild(nextButton);
                
            }
        }

       document.getElementById('multiplyButton').addEventListener('click', multiplyAndDisplay);

       function multiplyAndDisplay() {
    const multiplicationResultsContainer = document.getElementById('multiplicationResults');
    let resultsHTML = '<table class="table table-striped"><thead><tr><th>Product Name</th><th>Result</th></tr></thead><tbody>';

    const itemRows = document.querySelectorAll("#outputTable tbody tr");
    itemRows.forEach(row => {
        const productName = row.cells[0].textContent.trim();
        const itemTotal = parseInt(row.cells[1].textContent, 10);
        const productWeight = productDetails[productName];
        if (productWeight) {
            const multiplicationResult = itemTotal * productWeight;
            resultsHTML += `<tr><td>${productName}</td><td>Total Weight: ${multiplicationResult.toFixed(3)}</td></tr>`;
        } else {
            resultsHTML += `<tr><td>${productName}</td><td>Total Value: ${itemTotal}</td></tr>`;
        }
    });

    resultsHTML += '</tbody></table>';
    multiplicationResultsContainer.innerHTML = resultsHTML;
}

function saveParentProductTotals(parentProductTotals) {
            fetch('saveProductTotals.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(parentProductTotals)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data saved successfully:', data);
            })
            .catch(error => {
                console.error('Error saving data:', error);
            });
        }

document.getElementById('parentButton').addEventListener('click',getParentProduct);
function getParentProduct() {
    const productNames = Array.from(document.querySelectorAll("#outputTable tbody tr")).map(row => row.cells[0].textContent.trim());

    fetch('getParentProduct.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({ productNames })
})   
.then(response => response.json())
.then(data => {
    const parentProductDetailsContainer = document.getElementById('productDetails1');

    // Start creating the HTML for the table
    let contentHTML = '<table class="table table-striped"><thead><tr><th></th><th>Parent Product</th><th>Total Weight</th></tr></thead><tbody>';

    const weightsPerProduct = {}; // Object to store weights grouped by parent product

    const multiplicationResults = document.querySelectorAll("#multiplicationResults table tbody tr");

    multiplicationResults.forEach(row => {
        const productName = row.cells[0].textContent.trim();
        const value = parseFloat(row.cells[1].textContent.split(': ')[1]);

        // Find the corresponding parent product for the current product name
        const parentProductData = data.find(p => p.productName === productName);
       // console.log(parentProductData)
        if (parentProductData) {
            const parentProduct = parentProductData.parentProduct;

            // Accumulate the weight for each parent product
            weightsPerProduct[parentProduct] = (weightsPerProduct[parentProduct] || 0) + value;
            
        }
        
    });
    console.log(weightsPerProduct)
    
        // Inside the function that generates the table for parent products:
// Create a Set to track unique parent products
const uniqueProducts = new Set();

// Filter out the distinct data based on 'parentProduct'
const data1 = data.filter(product => {
    if (!uniqueProducts.has(product.parentProduct)) {
        uniqueProducts.add(product.parentProduct);
        return true; // Include this product since it's unique
    }
    return false; // Exclude this product because it's a duplicate
});

// Now, you can use data1 for the rest of your logic
data1.forEach(product => {
    const weight = weightsPerProduct[product.parentProduct];
    contentHTML += `<tr>
            <td><input type="checkbox" name="productSelect" value="${product.parentProduct}"></td>
            <td>${product.parentProduct}</td>
            <td><span id="weight_${product.parentProduct}">${weight ? weight.toFixed(3) : 'N/A'}</span></td>
            <td>
                <select name="batchSelect" class="form-control">
                    <option value="1">Batch 1</option>
                    <option value="2">Batch 2</option>
                    <option value="3">Batch 3</option>
                    <option value="4">Batch 4</option>
                </select>
            </td>
            <td>
                <button onclick="increaseWeight('${product.parentProduct}')">+</button>
                <button onclick="decreaseWeight('${product.parentProduct}')">-</button>
            </td>
        </tr>`;
});



        contentHTML += '</tbody></table><button id="sendToProduction" class="btn btn-primary">Send to Production</button>';
        parentProductDetailsContainer.innerHTML = contentHTML;
        
        document.getElementById('sendToProduction').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name="productSelect"]:checked');
    const selectedProducts = Array.from(checkboxes).map(checkbox => {
        const parentProduct = checkbox.value;
        const totalWeight = parseFloat(document.getElementById(`weight_${parentProduct}`).textContent);
        const batch = checkbox.closest('tr').querySelector('select[name="batchSelect"]').value;
        return { parentProduct, totalWeight, batch };
    });

    fetch('sendToProduction.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ selectedProducts })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Successfully sent to production.');
            window.location.reload();
        } else {
            alert(data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to send to production. Please try again.');
    });
});


        const parentProductTotals = data.map(product => ({
                    parentProduct: product.parentProduct,
                    totalWeight: weightsPerProduct[product.parentProduct] || 'N/A'
                }));

                saveParentProductTotals(parentProductTotals);
        
    })
    .catch(error => {
        console.error('Error fetching parent products:', error);
        parentProductDetailsContainer.innerHTML = '<p>Error fetching data.</p>';
    });
}

function increaseWeight(productId) {
    let weightSpan = document.getElementById(`weight_${productId}`);
    let currentWeight = parseFloat(weightSpan.textContent) || 0;
    let newWeight = currentWeight + 10;
    
    // Round to the nearest multiple of 10
    weightSpan.textContent = Math.round(newWeight / 10) * 10;
}

function decreaseWeight(productId) {
    let weightSpan = document.getElementById(`weight_${productId}`);
    let currentWeight = parseFloat(weightSpan.textContent) || 0;

    if (currentWeight > 0) {
        let newWeight = currentWeight - 10;
        
        // Round to the nearest multiple of 10
        weightSpan.textContent = Math.round(newWeight / 10) * 10;
    }
}


function handleSendToProduction() {
    const checkboxes = document.querySelectorAll('input[name="productSelect"]:checked');
    const selectedProducts = Array.from(checkboxes).map(checkbox => {
        const row = checkbox.closest('tr');
        const parentProduct = checkbox.value;
        const totalWeight = parseFloat(row.querySelector(`[id^="weight_"]`).textContent);
        const batch = row.querySelector('select[name="batchSelect"]').value;
        return { parentProduct, totalWeight, batch };
    });

    fetch('sendToProduction.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ selectedProducts })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Successfully sent to production.');
            window.location.reload();
        } else {
            alert(data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to send to production. Please try again.');
    });
}

// Add the following code after the existing script

// Create a new button element
const previewButton = document.createElement("button");
previewButton.textContent = "Preview";
previewButton.className = "btn btn-secondary";

// Append the button to the nextButtonContainer
const buttonContainer = document.getElementById("nextButtonContainer");
buttonContainer.appendChild(previewButton);

// Add an event listener to the preview button
previewButton.addEventListener("click", function() {
  // Reset the containers
  document.getElementById("outputTable").querySelector("tbody").innerHTML = "";
  document.getElementById("multiplicationResults").innerHTML = "";
  document.getElementById("productDetails").innerHTML = "";

  // Call the getParentProduct function to display the parent product table
  getParentProduct();
});
function fetchAvailableDates() {
    fetch('getAvailableDates.php')
        .then(response => response.json())
        .then(dates => {
            const dateInput = document.getElementById('fetch');
            const datePickerContainer = document.getElementById('datePickerContainer');

            // Create a flatpickr instance
            flatpickr(dateInput, {
                dateFormat: "Y-m-d",
                enable: dates,
                inline: true,
                container: datePickerContainer,
                onChange: function(selectedDates, dateStr) {
                    fetchParentProducts(dateStr);
                },
                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    // Check if this date is in the enabled dates
                    if (dates.includes(dayElem.dateObj.toISOString().split('T')[0])) {
                        dayElem.className += " highlighted-date";
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching available dates:', error));
}
function toggleCalendar() {
            const datePickerContainer = document.getElementById('datePickerContainer');
            if (datePickerContainer.style.display === 'none' || datePickerContainer.style.display === '') {
                datePickerContainer.style.display = 'block';
            } else {
                datePickerContainer.style.display = 'none';
            }
        }
function fetchParentProducts() {
    const selectedDate = document.getElementById('fetch').value;

    fetch('getProductTotals.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ selectedDate: selectedDate })
    })
    .then(response => response.json())
    .then(data => {
        // Create productDetails1 table if it doesn't exist
        let productDetails1 = document.getElementById('productDetails1');
        if (!productDetails1) {
            productDetails1 = document.createElement('div');
            productDetails1.id = 'productDetails1';
            productDetails1.className = 'product-details';
            document.querySelector('main').appendChild(productDetails1);
        }

        let table = productDetails1.querySelector('table');
        if (!table) {
            table = document.createElement('table');
            table.className = 'table table-striped';
            table.innerHTML = `
                <thead>
                    <tr>
                        <th></th>
                        <th>Parent Product</th>
                        <th>Total Weight</th>
                        <th>Batch</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            `;
            productDetails1.appendChild(table);
        }

        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';

        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="checkbox" name="productSelect" value="${item.parent_product}"></td>
                <td>${item.parent_product}</td>
                <td><span id="weight_${item.parent_product}">${item.total_weight}</span></td>
                <td>
                    <select name="batchSelect" class="form-control">
                        <option value="1">Batch 1</option>
                        <option value="2">Batch 2</option>
                        <option value="3">Batch 3</option>
                        <option value="4">Batch 4</option>
                    </select>
                </td>
                <td>
                    <button onclick="increaseWeight('${item.parent_product}')">+</button>
                    <button onclick="decreaseWeight('${item.parent_product}')">-</button>
                </td>
            `;
            tbody.appendChild(row);
        });

        // Add "Send to Production" button
        let sendButton = document.getElementById('sendToProductionButton');
        if (!sendButton) {
            sendButton = document.createElement('button');
            sendButton.id = 'sendToProductionButton';
            sendButton.textContent = 'Send to Production';
            sendButton.className = 'btn btn-primary';
            sendButton.onclick = handleSendToProduction;
            productDetails1.after(sendButton);
        }
    })
    .catch(error => {
        console.error('Error fetching parent products:', error);
    });
}


function addNewProduct() {
    const productNameInput = document.getElementById('newProductName');
    const productTotalInput = document.getElementById('newProductTotal');

    const productName = productNameInput.value.trim();
    const productTotal = parseFloat(productTotalInput.value);

    if (productName && !isNaN(productTotal)) {
        let productDetails1 = document.getElementById('productDetails1');
        if (!productDetails1) {
            productDetails1 = document.createElement('div');
            productDetails1.id = 'productDetails1';
            productDetails1.className = 'product-details';
            document.querySelector('main').appendChild(productDetails1);
        }

        let table = productDetails1.querySelector('table');
        if (!table) {
            table = document.createElement('table');
            table.className = 'table table-striped';
            table.innerHTML = `
                <thead>
                    <tr>
                        <th></th>
                        <th>Parent Product</th>
                        <th>Total Weight</th>
                        <th>Batch</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            `;
            productDetails1.appendChild(table);
        }

        const tbody = table.querySelector('tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="checkbox" name="productSelect" value="${productName}"></td>
            <td>${productName}</td>
            <td>
    <span id="weight_${productName}" contenteditable="true" onblur="saveWeight('${productName}', this)">
        ${productTotal.toFixed(3)}
    </span>
</td>

            <td>
                <select name="batchSelect" class="form-control">
                    <option value="1">Batch 1</option>
                    <option value="2">Batch 2</option>
                    <option value="3">Batch 3</option>
                    <option value="4">Batch 4</option>
                </select>
            </td>
            <td>
                <button class="weight-button" onclick="increaseWeight('${productName}')">+</button>
                <button class="weight-button" onclick="decreaseWeight('${productName}')">-</button>
            </td>
        `;
        tbody.appendChild(newRow);

        // Clear input fields
        productNameInput.value = '';
        productTotalInput.value = '';

        // Ensure "Send to Production" button exists
        let sendButton = document.getElementById('sendToProductionButton');
        if (!sendButton) {
            sendButton = document.createElement('button');
            sendButton.id = 'sendToProductionButton';
            sendButton.textContent = 'Send to Production';
            sendButton.className = 'btn btn-primary';
            sendButton.onclick = handleSendToProduction;
            productDetails1.after(sendButton);
        }
    } else {
        alert('Please enter valid product name and total weight.');
    }
}

function saveWeight(productName, element) {
    let newWeight = parseFloat(element.textContent);
    if (!isNaN(newWeight)) {
        // If the new weight is valid, update the content with rounded weight
        element.textContent = newWeight.toFixed(3);
        console.log(`Weight for product ${productName} updated to ${newWeight.toFixed(3)}`);
    } else {
        // Reset to the original value if input is invalid
        alert('Please enter a valid number.');
        // Optionally reset to the original value or handle accordingly
        element.textContent = "0.000";  // You can change this to the original value if you store it elsewhere
    }
}

// Function to fetch parent product names and populate the dropdown
function fetchParentProductNames() {
    fetch('getParentProductNames.php') // Adjust the URL to your backend endpoint
        .then(response => response.json())
        .then(data => {
            const productNameSelect = document.getElementById('newProductName');
            // Clear existing options
            productNameSelect.innerHTML = '';
            // Add options for each parent product name
            data.forEach(productName => {
                const option = document.createElement('option');
                option.value = productName;
                option.textContent = productName;
                productNameSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching parent product names:', error);
            // Handle errors, such as displaying an error message to the user
        });
}





  </script>
     <script src="./script.js"></script>
</body>
</html>

<style>
    /* Style for the editable weight span */
span[contenteditable="true"] {
    display: inline-block;
    padding: 6px;
    padding-right:20px;
    padding-left:15px;
    min-width: 50px; /* Ensure some default width */
    border: 1px solid gray; /* No visible border by default */
    border-radius: 4px;
    background-color: #f9f9f9; /* Light background to resemble an input field */
    transition: background-color 0.3s, border-color 0.3s; /* Smooth transition */
}

/* Focus state to indicate the span is being edited */
span[contenteditable="true"]:focus {
    outline: none; /* Remove the default browser outline */
    border-color: #4A90E2; /* Border color when focused (like an input field) */
    background-color: #ffffff; /* White background when focused */
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    border: 2px solid blue; /* No visible border by default */
    border-radius: 5px; /* Subtle shadow on focus */
}

/* Style for invalid entries (optional: you can trigger this class when validation fails) */
span.invalid {
    border-color: #E74C3C; /* Red border for invalid input */
    background-color: #FDEDEC; /* Light red background for invalid input */
}

.weight-button {
            background-color: transparent; /* background */
            border: none; /* Remove borders */
            color: black; /* black text */
            padding: 10px 15px; /* Some padding */
            text-align: center; /* Center the text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Make the buttons inline */
            font-size: 16px; /* Increase font size */
            margin: 4px 2px; /* Add some margin */
            cursor: pointer; /* Pointer cursor on hover */
            border:2px solid grey;
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth background transition */
        }

        .weight-button:hover {
            background-color: #007bff; /*  on hover */
            color:white;
        }

</style>









