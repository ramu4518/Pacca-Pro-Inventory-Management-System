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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding-left: 0.1px;
            margin-right:10px;
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <main>
        <h2 style="text-decoration: underline;">Welcome !!!</h2><br>
        <h5 style="color: #2193b0;">We deliver high-quality products and solutions that create value and competitive advantage for our clients. Our products and solutions provide lasting results, creating higher quality for our customers in a cost-effective way and help build a better way around us.</h5>
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center; text-decoration: underline;">Minimum Stock Quantity</h5>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center; text-decoration: underline;">Pending Order</h5>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center; text-decoration: underline;">Today's Order</h5>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                        <div class="row mb-2"><div class="col-12"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./script.js"></script>
</body>
</html>



