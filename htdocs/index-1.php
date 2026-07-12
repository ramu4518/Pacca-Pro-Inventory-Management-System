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
    <link rel="stylesheet" href="style-1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   
    <title>Dashboard</title>
    <style>
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 10px;
            margin-right:10px;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: black;
        }
        #Category.loading, #Colour.loading {
            color: #999;
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <div class="container">
        <!-- Create Category Button -->
        <div style="margin-bottom: 20px; margin-top: 30px;; margin-left: -950px;">
            <button id="createCategoryBtn" style="margin-right: 10px;">Create Category</button>
            <br>
            <button id="createColorBtn">Create Color</button>
        </div>

        <div style="margin-top: -170px;">
        <h1 >Pacca Pro Product Details</h1>
        <form action="connect.php" method="post">
            <div class="form-group">
                <label for="Brandname">Brand name:</label>
                <input type="text" id="Brandname" name="Brand_name" value="PP">
            </div>
            <div class="form-group">
                <label for="Category">Category:</label>
                <select id="Category" name="Category" onchange="toggleTextbox('Category')">
                    <option value="" class="loading">Loading categories...</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="Product">Product:</label>
                <input type="text" id="Product" name="Product" required>
            </div>
             <div class="form-group">
                    <label for="Colour">Colour:</label>
                    <select id="Colour" name="Color" onchange="toggleTextbox('Colour')">
                        <option value="" class="loading">Loading colors...</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="Version">Version:</label>
                <input type="text" id="Version" name="Version" value="1" readonly>
            </div>
            <div class="form-group">
                <label for="Unitmeasurement">Unit Measurement:</label>
                <select id="Unitmeasurement" name="Unit_Measurement" onchange="toggleTextbox('Unitmeasurement')">
                    <option value="P">POWDER</option>
                    <option value="L">LIQUID</option>
                    <option value="S">PASTE</option>
                </select>
                <input type="text" id="other-unitmeasurement-input" name="otherUnit" class="others-input" placeholder="Specify unit measurement">
            </div>
            <div class="form-group">
                <label for="Weightmeasurement">Weight Measurement:</label>
                <select id="Weightmeasurement" name="Weight_Measurement" onchange="toggleTextbox('Weightmeasurement')">
                    <option value="KG">KG</option>
                    <option value="G">G</option>
                    <option value="L">L</option>
                    <option value="ML">ML</option>
                </select>
                <input type="text" id="other-weightmeasurement-input" name="otherWeight" class="others-input" placeholder="Specify weight measurement">
            </div>
            <div class="form-group">
                <label for="Weightdimension">Weight Dimension:</label>
                <input type="text" id="Weightdimension" name="Weight_Dimention"required>
            </div>
            <div class="form-group">
                <label for="Packingmeasurement">Packing Measurement:</label>
                <select id="Packingmeasurement" name="Packing_Measurement" onchange="toggleTextbox('Packingmeasurement')">
                    <option value="R">RIGID</option>
                    <option value="F">FLEXIBLE</option>
                </select>
                <input type="text" id="other-packingmeasurement-input" name="otherPacking" class="others-input" placeholder="Specify packing measurement">
            </div>
            <div class="form-group">
                <label for="Futureversion">Future Version:</label>
                <input type="text" id="Futureversion" name="Future_Version" value="0" readonly>
            </div>
            <div class="form-group">
                <label for="Procode">Product Code:</label>
                <input type="text" id="Procode" name="pro_code"required>
            </div>
            <div class="form-group">
                <label for="Parentproduct">Parent Product:</label>
                <input type="text" id="Parentproduct" name="Parent_Product"required>
            </div>
            <div class="form-group">
                <label for="passcategory">Pass Category:</label>
                <select id="passcategory" name="pass_category" onchange="toggleTextbox('passcategory')">
                    <option value="BA">BAG</option>
                    <option value="BO">BOX</option>
                    <option value="CO">CONTAINER</option>
                    <option value="BR">BARREL</option>
                </select>
                <input type="text" id="other-passcategory-input" name="otherPass" class="others-input" placeholder="Specify pass category">
            </div>
            <button type="submit" id="btn">Submit</button>
        </form>
        </div>
        

        <div id="colorModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Create New Color</h2>
                <form id="colorForm">
                    <div class="form-group">
                        <label for="colorName">Color Name:</label>
                        <input type="text" id="colorName" name="colorName" required>
                    </div>
                    <div class="form-group">
                        <label for="colorCode">Color Code (3 characters max):</label>
                        <input type="text" id="colorCode" name="colorCode" maxlength="3" required>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        
        <!-- The Modal -->
        <div id="categoryModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Create New Category</h2>
                <form id="categoryForm">
                    <div class="form-group">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryCode">Category Code (2 characters max):</label>
                        <input type="text" id="categoryCode" name="categoryCode" maxlength="2" required>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>

function loadCategories() {
            const categoryDropdown = document.getElementById('Category');
            categoryDropdown.classList.add('loading');
            
            fetch('get_categories.php')
                .then(response => response.json())
                .then(data => {
                    categoryDropdown.innerHTML = ''; // Clear loading message
                    
                    if (data.length > 0) {
                        data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category.Category_code;
                            option.textContent = category.Category_name;
                            categoryDropdown.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.textContent = 'No categories found';
                        categoryDropdown.appendChild(option);
                    }
                    
                    categoryDropdown.classList.remove('loading');
                })
                .catch(error => {
                    console.error('Error loading categories:', error);
                    categoryDropdown.innerHTML = '<option value="">Error loading categories</option>';
                    categoryDropdown.classList.remove('loading');
                });
        }

        function loadColors() {
            const colorDropdown = document.getElementById('Colour');
            colorDropdown.classList.add('loading');
            
            fetch('get_colors.php')
                .then(response => response.json())
                .then(data => {
                    colorDropdown.innerHTML = ''; // Clear loading message
                    
                    // Add default "NO COLOR" option
                    const defaultOption = document.createElement('option');
                    defaultOption.value = "00";
                    defaultOption.textContent = "NO COLOR";
                    colorDropdown.appendChild(defaultOption);
                    
                    if (data.length > 0) {
                        data.forEach(color => {
                            const option = document.createElement('option');
                            option.value = color.Color_code;
                            option.textContent = color.Color_name;
                            colorDropdown.appendChild(option);
                        });
                    }
                    
                    
                    colorDropdown.classList.remove('loading');
                })
                .catch(error => {
                    console.error('Error loading colors:', error);
                    colorDropdown.innerHTML = '<option value="">Error loading colors</option>';
                    colorDropdown.classList.remove('loading');
                });
        }


        document.addEventListener('DOMContentLoaded', function() {
            loadCategories();
            loadColors();
            
            // Modal elements
            const categoryModal = document.getElementById("categoryModal");
            const colorModal = document.getElementById("colorModal");
            const createCategoryBtn = document.getElementById("createCategoryBtn");
            const createColorBtn = document.getElementById("createColorBtn");
            const closeButtons = document.getElementsByClassName("close");
            
            // Category modal functionality
            createCategoryBtn.onclick = function() {
                categoryModal.style.display = "block";
            }
            
            // Color modal functionality
            createColorBtn.onclick = function() {
                colorModal.style.display = "block";
            }
            
            // Close buttons functionality
            for (let i = 0; i < closeButtons.length; i++) {
                closeButtons[i].onclick = function() {
                    this.closest('.modal').style.display = "none";
                }
            }
            
            // Close modals when clicking outside
            window.onclick = function(event) {
                if (event.target == categoryModal) {
                    categoryModal.style.display = "none";
                }
                if (event.target == colorModal) {
                    colorModal.style.display = "none";
                }
            }
            
            // Category form submission
            document.getElementById("categoryForm").onsubmit = function(e) {
                e.preventDefault();
                
                const categoryName = document.getElementById("categoryName").value;
                const categoryCode = document.getElementById("categoryCode").value.toUpperCase();
                
                if (categoryCode.length !== 2) {
                    alert("Category code must be exactly 2 characters long.");
                    return;
                }
                
                fetch('add_category.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `Category_name=${encodeURIComponent(categoryName)}&Category_code=${encodeURIComponent(categoryCode)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("successfully")) {
                        categoryModal.style.display = "none";
                        document.getElementById("categoryForm").reset();
                        loadCategories();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred while saving the category.");
                });
            }
            
            // Color form submission
            document.getElementById("colorForm").onsubmit = function(e) {
                e.preventDefault();
                
                const colorName = document.getElementById("colorName").value;
                const colorCode = document.getElementById("colorCode").value.toUpperCase();
                
                if (colorCode.length !== 2) {
                    alert("Color code must be exactly 2 characters long.");
                    return;
                }
                
                fetch('add_color.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `Color_name=${encodeURIComponent(colorName)}&Color_code=${encodeURIComponent(colorCode)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("successfully")) {
                        colorModal.style.display = "none";
                        document.getElementById("colorForm").reset();
                        loadColors();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred while saving the color.");
                });
            }
        });

        function toggleTextbox(field) {
            const dropdown = document.getElementById(field);
            const otherInput = document.getElementById(`other-${field.toLowerCase()}-input`);

            if (dropdown.value === "Others") {
                otherInput.style.display = "block";
            } else {
                otherInput.style.display = "none";
            }
        }
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            alert("Product added successfully!");
        }

        // Modal functionality
        const modal = document.getElementById("categoryModal");
        const btn = document.getElementById("createCategoryBtn");
        const span = document.getElementsByClassName("close")[0];
        const categoryForm = document.getElementById("categoryForm");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        categoryForm.onsubmit = function(e) {
            e.preventDefault();
            
            const categoryName = document.getElementById("categoryName").value;
            const categoryCode = document.getElementById("categoryCode").value;
            
            // Validate category code length
            if (categoryCode.length !== 2) {
                alert("Category code must be exactly 2 characters long.");
                return;
            }
            
            // Send data to server using Fetch API
            fetch('add_category.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `Category_name=${encodeURIComponent(categoryName)}&Category_code=${encodeURIComponent(categoryCode)}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Show response from server
                if (data.includes("successfully")) {
                    // Close modal and reset form
                    modal.style.display = "none";
                    categoryForm.reset();
                    
                    // Optionally, refresh the category dropdown
                    // You would need to implement this part based on your needs
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while saving the category.");
            });
        }
    </script>
    <script src="./script.js"></script>
</body>
</html>