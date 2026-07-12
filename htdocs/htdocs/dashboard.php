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
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="dashboard.php" class="nav_logo"> <img src="assets/img/f-logo.png" alt="Logo" style="height: 40px;">
                <span class="nav_logo-name">Pacca Pro</span> </a>
                <div class="nav_list">
                <a href="http://127.0.0.1:5000/" class="nav_link active"><i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">In Model</span></a>
                    <a href="production.php" class="nav_link"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Production</span> </a>
                    <a href="packaging.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Packaging</span></a>
                    <a href="qr.php" class="nav_link"> <i class='bx bx-qr nav_icon'></i> <span class="nav_name">QR</span></a>
                    <a href="stock.php" class="nav_link"> 
                        <i class='bx bx-package nav_icon'></i> 
                        <span class="nav_name">Stock</span>
                    </a>
                    <a href="out_model.php" class="nav_link"> 
                        <i class='bx bx-cart nav_icon'></i> 
                        <span class="nav_name">Out</span>
                    </a>
                    <a href="Outmodell.php" class="nav_link"> 
                        <i class='bx bx-send nav_icon'></i> 
                        <span class="nav_name">Dispatch</span>
                    </a>
                    <a href="plan.php" class="nav_link"> 
                    <i class='bx bx-expand-alt' ></i>
                        <span class="nav_name">Plan</span>
                    </a>
                </div>
            </div>
            <a href="index.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">LogOut</span> </a>
        </nav>
    </div>
    <main>
        <h2 style="text-decoration: underline;" >Welcome !!!</h2><br>
        <h5 style="color: #2193b0;">We deliver high-quality products and solutions that create value and competitive advantage for our clients.
Our products and solutions provide lasting results, creating higher quality for our customers in a cost-effective way and help build a better way around us.</h5>
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center; text-decoration: underline;" >Minimum Stock Quantity</h5>
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
                        <h5 class="card-title" style="text-align:center; text-decoration: underline;" >Pending Order</h5>
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
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./script.js"></script>
</body>
</html>
