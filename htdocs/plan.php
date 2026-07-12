<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            padding-left: 0.1px;
            margin-right:10px;
        }
        @media print {
            .styled-table {
                border-collapse: collapse;
            }
            .styled-table th, .styled-table td {
                border: 1px solid #000;
            }
        }

        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
        }

        .styled-table th, .styled-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #f2f2f2;
        }

        .styled-table th:not(:last-child),
        .styled-table td:not(:last-child) {
            border-right: 1px solid #ddd;
        }

        /* Responsive table */
        @media screen and (max-width: 600px) {
            .styled-table th,
            .styled-table td {
                border: 0;
            }
            .styled-table th {
                display: none;
            }
            .styled-table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: 10px;
            }
            .styled-table td {
                border-bottom: 0;
                display: block;
                font-size: 14px;
                text-align: right;
            }
            .styled-table td:last-child {
                border-bottom: 0;
            }
        }

        .date-option-selector {
            margin-bottom: 15px;
        }
        .date-range-selector {
            display: none;
            margin-top: 10px;
        }

        /* Button styles */
    .date-range-submit, #print_button, #print_button1 {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 5px;
    }

    /* Date range submit buttons */
    .date-range-submit {
        background-color: #007bff;
        color: white;
    }

    .date-range-submit:hover {
        background-color: #0069d9;
    }

    /* Print buttons */
    #print_button {
        background-color: #28a745;
        color: white;
    }

    #print_button:hover {
        background-color: #218838;
    }

    #print_button1 {
        background-color: #17a2b8;
        color: white;
    }

    #print_button1:hover {
        background-color: #138496;
    }

    /* Disabled state */
    #print_button:disabled, #print_button1:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
        opacity: 0.65;
    }

    /* Enabled state */
    #print_button.enabled, #print_button1.enabled {
        cursor: pointer;
        opacity: 1;
    }

    /* Date input fields */
    input[type="date"] {
        padding: 6px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        margin-right: 10px;
    }

    /* Radio button labels */
    .date-option-selector label {
        margin-right: 15px;
        cursor: pointer;
    }

    /* Radio buttons */
    input[type="radio"] {
        margin-right: 5px;
        cursor: pointer;
    }
    
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>

    <div id="productiondata" style="display:none;"> 
        <center><h2>Production data</h2></center>
        <div class="date-option-selector">
            <input type="radio" name="production_date_option" id="production_single_date" value="single" checked>
            <label for="production_single_date">Single Date</label>
            <input type="radio" name="production_date_option" id="production_date_range" value="range">
            <label for="production_date_range">Date Range</label>
        </div>
        
        <div id="production_single_date_selector">
            Date: <select id="date_select" placeholder="Select the date">
                <option value="" selected>Select the date</option>
                <?php
                include 'db_connect.php';
                $sql = "SELECT DISTINCT DATE(date_added) AS dates FROM production";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_date = $row['dates'];
                        echo "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
        </div>
        
        <div id="production_date_range_selector" class="date-range-selector">
            From: <input type="date" id="production_date_from">
            To: <input type="date" id="production_date_to">
            <button id="production_range_submit" class="date-range-submit">Submit</button>
        </div>
        
        <br><br>
        <div id="printable_content">
            <div id="data_display"></div>
        </div>
        <br><br>
        <input type="button" id="print_button" value="Print" onclick="printData()" disabled />
    </div>

    <div id="packagingdata" style="display:none;"> 
        <center><h2>Packaging data</h2></center>
        <div class="date-option-selector">
            <input type="radio" name="packaging_date_option" id="packaging_single_date" value="single" checked>
            <label for="packaging_single_date">Single Date</label>
            <input type="radio" name="packaging_date_option" id="packaging_date_range" value="range">
            <label for="packaging_date_range">Date Range</label>
        </div>
        
        <div id="packaging_single_date_selector">
            Date: <select id="date_select1" placeholder="Select the date">
                <option value="" selected>Select the date</option>
                <?php
                include 'db_connect.php';
                $sql = "SELECT DISTINCT DATE(date_inserted) AS dates1 FROM packaging";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_date = $row['dates1'];
                        echo "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
        </div>
        
        <div id="packaging_date_range_selector" class="date-range-selector">
            From: <input type="date" id="packaging_date_from">
            To: <input type="date" id="packaging_date_to">
            <button id="packaging_range_submit" class="date-range-submit">Submit</button>
        </div>
        
        <br><br>
        <div id="printable_content1">
            <div id="data_display1"></div>
        </div>
        <br><br>
        <input type="button" value="Print" onclick="printData1()" id="print_button1" disabled/>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var planLink = document.getElementById('plan-link');
        var planSubmenu = document.getElementById('plan-submenu');
        var planProductionLink = document.getElementById('plan-production-link');
        var planPackagingLink = document.getElementById('plan-packaging-link');
        var productionData = document.getElementById('productiondata');
        var packagingData = document.getElementById('packagingdata');

        planLink.addEventListener('click', function(e) {
            e.preventDefault();
            planSubmenu.style.display = planSubmenu.style.display === 'none' ? 'block' : 'none';
        });

        planProductionLink.addEventListener('click', function(e) {
            e.preventDefault();
            productionData.style.display = 'block';
            packagingData.style.display = 'none';
            planSubmenu.style.display = 'none';
        });

        planPackagingLink.addEventListener('click', function(e) {
            e.preventDefault();
            productionData.style.display = 'none';
            packagingData.style.display = 'block';
            planSubmenu.style.display = 'none';
        });

        // Production date option toggle
        document.querySelectorAll('input[name="production_date_option"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'single') {
                    document.getElementById('production_single_date_selector').style.display = 'block';
                    document.getElementById('production_date_range_selector').style.display = 'none';
                } else {
                    document.getElementById('production_single_date_selector').style.display = 'none';
                    document.getElementById('production_date_range_selector').style.display = 'block';
                }
            });
        });

        // Packaging date option toggle
        document.querySelectorAll('input[name="packaging_date_option"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'single') {
                    document.getElementById('packaging_single_date_selector').style.display = 'block';
                    document.getElementById('packaging_date_range_selector').style.display = 'none';
                } else {
                    document.getElementById('packaging_single_date_selector').style.display = 'none';
                    document.getElementById('packaging_date_range_selector').style.display = 'block';
                }
            });
        });

        // Production range submit
        document.getElementById('production_range_submit').addEventListener('click', function() {
            var fromDate = document.getElementById('production_date_from').value;
            var toDate = document.getElementById('production_date_to').value;
            
            if (fromDate && toDate) {
                $.ajax({
                    url: 'retrieve_data.php',
                    type: 'post',
                    data: {dateRange: 'true', fromDate: fromDate, toDate: toDate},
                    success: function(response) {
                        $('#data_display').html(response);
                        $('#print_button').prop('disabled', false).addClass('enabled');
                    }
                });
            } else {
                alert('Please select both dates');
            }
        });

        // Packaging range submit
        document.getElementById('packaging_range_submit').addEventListener('click', function() {
            var fromDate = document.getElementById('packaging_date_from').value;
            var toDate = document.getElementById('packaging_date_to').value;
            
            if (fromDate && toDate) {
                $.ajax({
                    url: 'packagingdata.php',
                    type: 'post',
                    data: {dateRange: 'true', fromDate: fromDate, toDate: toDate},
                    success: function(response) {
                        $('#data_display1').html(response);
                        $('#print_button1').prop('disabled', false).addClass('enabled');
                    }
                });
            } else {
                alert('Please select both dates');
            }
        });
    });

    $(document).ready(function(){
        $('#date_select').change(function(){
            var selectedDate = $(this).val();
            if(selectedDate !== '') {
                $.ajax({
                    url: 'retrieve_data.php',
                    type: 'post',
                    data: {selectedDate: selectedDate},
                    success: function(response) {
                        $('#data_display').html(response);
                        $('#print_button').prop('disabled', false).addClass('enabled');
                    }
                });
            } else {
                $('#printable_content').html('');
                $('#print_button').prop('disabled', true).removeClass('enabled');
            }
        });

        $('#date_select1').change(function(){
            var selectedDate = $(this).val();
            if(selectedDate !== '') {
                $.ajax({
                    url: 'packagingdata.php',
                    type: 'post',
                    data: {selectedDate: selectedDate},
                    success: function(response) {
                        $('#data_display1').html(response);
                        $('#print_button1').prop('disabled', false).addClass('enabled');
                    }
                });
            } else {
                $('#printable_content1').html('');
                $('#print_button1').prop('disabled', true).removeClass('enabled');
            }
        });
    });

    function printData() {
        printContent('printable_content');
    }

    function printData1() {
        printContent('printable_content1');
    }

    function printContent(elementId) {
        var originalContents = document.body.innerHTML;
        var printContents = document.getElementById(elementId).innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>

    <script src="./script.js"></script>
</body>
</html>