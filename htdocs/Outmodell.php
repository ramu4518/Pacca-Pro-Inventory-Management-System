<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style1.css">
    <style>
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 15px;
        }

        .view-button-cell {
            text-align: center;
        }

        /* Modal content styles */
        .modal-content {
            position: relative; /* Ensure that the footer form is positioned relative to the modal */
            height: 600px;
            display: flex;
            flex-direction: column;
        }

        /* Modal body should be scrollable */
        .modal-body {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 70px; /* Space for the fixed footer */
        }

        /* Position the form (footer) at the bottom-right of the modal */
        .modal-footer {
            position: absolute;
            bottom:0;
            width: 100%;
            background-color: white;
            padding: 10px;
            
            
        }

        /* Style the form buttons */
        .modal-footer .btn {
            width: auto;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

    </style>
    <title>DisPatch</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <main>
        <center><h4>Packaging</h4></center>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Order No</th>
                    <th>Particulars</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_order_details.php'; echo $order_details; ?>
            </tbody>
        </table>

        <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="orderDetailsModalLabel">Order Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="orderDetailsContent"></div>

                    <!-- Footer with Submit and Close button -->
                    <div class="modal-footer">
                        <form id="proceedForm" action="update_sales_no.php" method="post">
                            <input type="hidden" id="selectedOrderId" name="selected_order">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </main>

    <script>
        function showViewButton(radio) {
            document.querySelectorAll('.view-button-cell').forEach(cell => {
                cell.innerHTML = '';
            });

            const selectedRow = radio.closest('tr');
            const viewButtonCell = selectedRow.querySelector('.view-button-cell');
            const viewButton = document.createElement('button');
            viewButton.textContent = 'View';
            viewButton.classList.add('btn', 'btn-secondary');
            viewButton.onclick = function() {
                const orderId = radio.value;
                fetchOrderDetails(orderId);
            };

            viewButtonCell.appendChild(viewButton);
        }

        function fetchOrderDetails(orderId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetch_order_details.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('orderDetailsContent').innerHTML = xhr.responseText;
                    document.getElementById('selectedOrderId').value = orderId;
                    const orderDetailsModal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
                    orderDetailsModal.show();
                }
            };
            xhr.send('order_id=' + orderId);
        }
    </script>

    <script src="./outscript.js"></script>
</body>
</html>
