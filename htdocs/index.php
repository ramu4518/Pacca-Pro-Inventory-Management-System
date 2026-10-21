<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Pacca Pro</title>
    <style>

  .login__img{
    display: flex;
    width: 600px;
    height: 588px;
    background-color:white;
    border-radius: 1rem;
    padding-left: 1rem;
  }

          .login__button {
            display: block;
            padding: 1rem;
            margin: 2rem auto; /* Changed from margin: 2rem 0; to auto to center horizontally */
            background-color: #2193b0;
            color: #FFF;
            font-weight: 1000;
            text-align: center;
            border-radius: .5rem;
            transition: .3s;
            width: 80%; /* You can adjust the width as needed */
        }
        
        .login__button:hover{
            background-color: #000;
        }
        .login__icon{
            font-size: 1.5rem;
            color: #2193b0;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        #logoback
        {
            background-color:#fff;
        }
        /* Style for the input field */
   

    /* Hide placeholder when the input is focused */
    .login__input:focus::placeholder {
        color: transparent; /* Hides the placeholder text */
    }

    /* Optionally, you can make the placeholder visible again when focus is lost */
    .login__input::placeholder {
        color: #888; /* Style for placeholder when not focused */
    }

    </style>
</head>
<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img" >
                <img id="logoback" src="#" alt="">
            </div>

            <div class="login__forms">
                <form action="login.php" method="POST" class="login__registre" id="login-in">
                    <h1 class="login__title">LOGIN01</h1>
    
                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="username" placeholder="Username" class="login__input">
                    </div>
    
                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input">
                    </div>

                    <button type="submit" class="login__button">Login</button>

                    <!-- Display error message if it exists -->
                    <?php
                        if (!empty($_SESSION['error'])) {
                            echo '<div class="error">' . $_SESSION['error'] . '</div>';
                            // Clear the error message after displaying it
                            unset($_SESSION['error']);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
</body>
</html>
