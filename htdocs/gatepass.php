<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Pass</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
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
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .form-group label {
            flex: 1;
        }
        .form-group input {
            flex: 2;
        }
        .form-group-fullwidth {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .form-group-fullwidth input {
            flex: 1;
            margin-left: 1rem;
        }
        .form-group-align-center {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body id="body-pd">
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <div class="container mt-5">
       <center> <h2>Gate Pass - Fully Processed Orders</h2></center>
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Order ID</th>
                    <th>Particulars</th>
                </tr>
            </thead>
            <tbody id="gatepassTable">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
        <button id="generateGatePassButton" class="btn btn-primary">Generate Gate Pass</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="gatePassModal" tabindex="-1" aria-labelledby="gatePassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gatePassModalLabel">Generate Gate Pass</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="gatePassForm" method="POST" action="updategate.php">
                        <div class="form-group">
                            <label for="serialNo">Id</label>
                            <input type="text" class="form-control" id="serialNo" name="serialNo"readonly>
                            <label for="date" style="margin-left: 1rem;">Date</label>
                            <input type="text" class="form-control" id="date" name="date" readonly>
                        </div>
                        <!-- <div class="form-group">
                            <label for="orderID">GATEPASS_ID</label>
                            <input type="text" class="form-control" id="orderID" name="orderID"readonly>
                        </div> -->
                        <div class="form-group">
                            <label for="vehicleNo">Vehicle No</label>
                            <input type="text" class="form-control" id="vehicleNo" name="vehicleNo" required>
                            <label for="time" style="margin-left: 1rem;">Time</label>
                            <input type="text" class="form-control" id="time" name="time" readonly>
                        </div> 
                        <div class="form-group">
                            <label for="box">1. Box</label>
                            <input type="number" class="form-control" id="box" name="box" min="0" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bag">2. Bag</label>
                            <input type="number" class="form-control" id="bag" name="bag" min="0" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="container">3. Container</label>
                            <input type="number" class="form-control" id="container" name="container" min="0" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="container">4. Barrel</label>
                            <input type="number" class="form-control" id="barrel" name="barrel" min="0" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total" readonly style="max-width: 200px;">
                        </div>
                        <div class="form-group-fullwidth">
                            <label for="driverSign">Driver Sign & Mobile No</label>
                            <input type="text" class="form-control" id="driverSign" name="driverSign" required>
                        </div>
                        <div class="form-group-fullwidth">
                            <label for="approvedBy">Approved By</label>
                            <input type="text" class="form-control" id="approvedBy" name="approvedBy" required>
                        </div>
                        <div class="form-group-fullwidth">
                            <label for="security">Security</label>
                            <input type="text" class="form-control" id="security"name="security" required>
                        </div>
                        <div class="form-group-align-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" id="printButton" style="margin-left: 1rem;">Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('fetchgate.php?fully_processed=1')
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => Promise.reject(err));
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);  // Debug: Log received data
                    const tableBody = document.getElementById('gatepassTable');
                    if (data.length === 0) {
                        tableBody.innerHTML = '<tr><td colspan="3">No fully processed orders found.</td></tr>';
                    } else {
                        data.forEach(order => {
                            const row = tableBody.insertRow();
                            const cellCheckbox = row.insertCell(0);
                            const cellOrderId = row.insertCell(1);
                            const cellParticulars = row.insertCell(2);
                            cellCheckbox.innerHTML = `<input type="checkbox" class="order-checkbox" value="${order.order_id}">`;
                            cellOrderId.textContent = order.order_id;
                            cellParticulars.textContent = order.particulars;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    let errorMessage = 'Error fetching data';
                    if (error.error) {
                        errorMessage += ': ' + error.error;
                    }
                    document.getElementById('error-message').textContent = errorMessage;
                    document.getElementById('error-message').style.display = 'block';
                });

                document.getElementById('generateGatePassButton').addEventListener('click', function() {
                    const selectedOrders = Array.from(document.querySelectorAll('.order-checkbox:checked'))
                                                .map(checkbox => checkbox.value);

                    if (selectedOrders.length > 0) {
                        fetch('fetchmaxsno.php')
                            .then(response => response.json())
                            .then(maxSno => {
                                let serialNo = maxSno.max_sno === null ? 1 : parseInt(maxSno.max_sno) + 1;

                                const now = new Date();
                                const date = now.toLocaleDateString();
                                const time = now.toLocaleTimeString();

                                document.getElementById('serialNo').value = serialNo;
                                document.getElementById('date').value = date;
                                document.getElementById('time').value = time;

                                // Store order IDs in a hidden input
                                let hiddenInput = document.getElementById('selectedOrderIDs');
                                if (!hiddenInput) {
                                    hiddenInput = document.createElement('input');
                                    hiddenInput.type = 'hidden';
                                    hiddenInput.id = 'selectedOrderIDs';
                                    hiddenInput.name = 'orderIDs'; // Name to be used in PHP
                                    document.getElementById('gatePassForm').appendChild(hiddenInput);
                                }
                                hiddenInput.value = selectedOrders.join(',');

                                // Initialize totals
                                let totalBox = 0, totalBag = 0, totalContainer = 0, totalBarrel = 0;

                                // Create an array of fetch promises for all selected orders
                                const fetchPromises = selectedOrders.map(order_id => 
                                    fetch(`fetch_order_totals.php?order_id=${order_id}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            if (!data.error) {
                                                totalBox += data.total_box;
                                                totalBag += data.total_bag;
                                                totalContainer += data.total_container;
                                                totalBarrel += data.total_barrel;
                                            }
                                        })
                                        .catch(error => console.error('Error fetching order totals:', error))
                                );

                                // Wait for all fetch requests to complete
                                Promise.all(fetchPromises).then(() => {
                                    // Set the aggregated totals in the input fields
                                    document.getElementById('box').value = totalBox;
                                    document.getElementById('bag').value = totalBag;
                                    document.getElementById('container').value = totalContainer;
                                    document.getElementById('barrel').value = totalBarrel;
                                    document.getElementById('total').value = totalBox + totalBag + totalContainer + totalBarrel;

                                    // Show the modal
                                    const modal = new bootstrap.Modal(document.getElementById('gatePassModal'));
                                    modal.show();
                                });

                            })
                            .catch(error => {
                                console.error('Error fetching max S_no:', error);
                                alert('Error generating gate pass. Please try again.');
                            });
                    } else {
                        alert('Please select at least one order to generate a gate pass.');
                    }
                });



            ['box', 'bag', 'container','barrel'].forEach(id => {
                document.getElementById(id).addEventListener('input', function() {
                    const box = parseInt(document.getElementById('box').value) || 0;
                    const bag = parseInt(document.getElementById('bag').value) || 0;
                    const container = parseInt(document.getElementById('container').value) || 0;
                    const barrel = parseInt(document.getElementById('barrel').value) || 0;
                    document.getElementById('total').value = box + bag + container + barrel;
                });
            });

            document.getElementById('printButton').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="./outscript.js"></script>
</body>
</html>