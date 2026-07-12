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
            padding-left: 15px; 
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
        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
        }

        .styled-table th, .styled-table td {
            padding: 10px;
            border: 1px solid #ddd; /* Add borders to all sides of cells */
        }

        .styled-table th {
            background-color: #f2f2f2;
        }

        /* Add vertical lines between columns */
        .styled-table th:not(:last-child),
        .styled-table td:not(:last-child) {
            border-right: 1px solid #ddd;
        }

        /* Responsive table */
        @media screen and (max-width: 600px) {
            .styled-table th,
            .styled-table td {
                border: 0; /* Remove borders for smaller screens */
            }
            .styled-table th {
                display: none; /* Hide header cells for smaller screens */
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


    </style>
    
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>


    <div id=productiondata style="display:none;"> 
        Date : <select id="date_select" placeholder="Select the date">
            <option value="" selected >Select the date</option>
                <?php
                // Connect to your database
                $db_host = 'localhost';
                $db_name = 'paccapro';
                $db_user = 'root';
                $db_pass = '';
                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch dates where status is 0
                $sql = "SELECT DISTINCT DATE(date_added) AS dates FROM production";
                $result = $conn->query($sql);

                // Populate dropdown with distinct dates
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_date = $row['dates'];
                        echo "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
                    }
                }

                // Close connection
                $conn->close();
                ?>
        </select>
        <br><br>
        <div id="printable_content">
        <center>
            <h2>Production data</h2></center>
            <div id="data_display"></div>
        </div>

        <script>
            $(document).ready(function(){
                $('#date_select').change(function(){
                    var selectedDate = $(this).val();
                    if(selectedDate !== '') {
                        $.ajax({
                            url: 'retrieve_data.php', // PHP script to retrieve data
                            type: 'post',
                            data: {selectedDate: selectedDate},
                            success: function(response) {
                                $('#data_display').html(response);
                                $('#print_button').prop('disabled', false);
                            }
                        });
                    }else {
                        $('#printable_content').html(''); // Clear the printable content if no date selected
                        $('#print_button').prop('disabled', true); // Disable the print button
                    }
                });
            });
        </script>
        <br><br>
        <input type = "button" id="print_button" value = "Print" onclick = "printData()" disabled />
    </div>


    <div id=packagingdata style="display:none;"> 
        Date : <select id="date_select1" placeholder="Select the date">
             <option value="" selected >Select the date</option>
                <?php
                // Connect to your database
                $db_host = 'localhost';
                $db_name = 'paccapro';
                $db_user = 'root';
                $db_pass = '';
                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch dates where status is 0
                $sql = "SELECT DISTINCT DATE(date_inserted) AS dates1 FROM packaging";
                $result = $conn->query($sql);

                // Populate dropdown with distinct dates
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_date = $row['dates1'];
                        echo "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
                    }
                }

                // Close connection
                $conn->close();
                ?>
        </select>
        <br><br>
        <div id="printable_content1">
            <center>
            <h2>Packaging data</h2></center>
            <div id="data_display1"></div>
        </div>

        <script>
            $(document).ready(function(){
                $('#date_select1').change(function(){
                    var selectedDate = $(this).val();
                    if(selectedDate !== '') {
                        $.ajax({
                            url: 'packagingdata.php', // PHP script to retrieve data
                            type: 'post',
                            data: {selectedDate: selectedDate},
                            success: function(response) {
                                $('#data_display1').html(response);
                                $('#print_button1').prop('disabled', false);
                            }
                        });
                    }else {
                        $('#printable_content1').html(''); // Clear the printable content if no date selected
                        $('#print_button1').prop('disabled', true); // Disable the print button
                    }
                });
            });


        </script>
        <br><br>
        <input type = "button" value = "Print" onclick = "printData1()" id="print_button1" disabled/>
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

