<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login - Campus Connect</title>

    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <main>
        <div class="right__container">
            <div class="container">
                <img src="../../images/Ashesi_Logo-removebg-preview.png" alt="Ashesi Logo" width="80" height="80">
                <h2>Welcome back!</h2>

            <?php

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyFields') {
                        echo '<p class="error_messages">All fills are required!</p>';
                        echo ' <form action="validate_login.php" method="POST" novalidate>
                        <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" autofocus>
                        <label for="email"><img src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <div class="remember">
                            <input type="checkbox" name="remember__me" id="remember__me">
                            <p for="remember__me" class="remember__me">Remember Me</p>
                        </div>
        
                        <p class="forgot__password"><a href="../reset/reset_password.php" name="reset">Forgot Password?</a></p>
                        
                        <button class="login__btn" type="submit" name="login-submit">
                            Sign In
                        </button>
                        
                        <p class="sign__up">Don\'t have an account? Sign Up <a href="../sign-up/register.php">here</a></p>
                    </form>';
                    } 
                    else if ($_GET['error'] == 'invalidPassword' || $_GET['error'] == 'invalidInputs') {
                        echo '<p class="error_messages">You have entered an invalid email or password!</p>';
                        
                       
                        echo '<form action="validate_login.php" method="POST" novalidate>
                        <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" autofocus>
                        <label for="email"><img src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <div class="remember">
                            <input type="checkbox" name="remember__me" id="remember__me">
                            <p for="remember__me" class="remember__me">Remember Me</p>
                        </div>
        
                        <p class="forgot__password"><a href="../reset/reset_password.php" name="reset">Forgot Password?</a></p>
                        
                        <button class="login__btn" type="submit" name="login-submit">
                            Sign In
                        </button>
                        
                        <p class="sign__up">Don\'t have an account? Sign Up <a href="../sign-up/register.php">here</a></p>
                    </form>';
                    }
                    else {
                        echo '<p class="error_messages">Something went wrong!</p>';
                        echo '<form action="validate_login.php" method="POST" novalidate>
                        <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" autofocus  value='.$email.'>
                        <label for="email"><img src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <div class="remember">
                            <input type="checkbox" name="remember__me" id="remember__me">
                            <p for="remember__me" class="remember__me">Remember Me</p>
                        </div>
        
                        <p class="forgot__password"><a href="../reset/reset_password.php" name="reset">Forgot Password?</a></p>
                        
                        <button class="login__btn" type="submit" name="login-submit">
                            Sign In
                        </button>
                        
                        <p class="sign__up">Don\'t have an account? Sign Up <a href="../sign-up/register.php">here</a></p>
                    </form>';
                    }
                } else {
                    echo '<form action="validate_login.php" method="POST" novalidate>
                    <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" autofocus>
                    <label for="email"><img src="../../assets/mdi_email.svg" width="20" height="20"></label>
                    <br>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                    
                    <div class="remember">
                        <input type="checkbox" name="remember__me" id="remember__me">
                        <p for="remember__me" class="remember__me">Remember Me</p>
                    </div>
    
                    <p class="forgot__password"><a href="../reset/reset_password.php" name="reset">Forgot Password?</a></p>
                    
                    <button class="login__btn" type="submit" name="login-submit">
                        Sign In
                    </button>
                    
                    <p class="sign__up">Don\'t have an account? Sign Up <a href="../sign-up/register.php">here</a></p>
                </form>';
                }
            ?>    
                <?php
                    if (isset($_GET['resetpassword'])) {
                        if ($_GET['resetpassword'] == 'passwordupdated') {
                            echo '<p class="reset">Check your email!</p>';
                        }
                    } 
                ?>
        </div>
    </main>

    <script src="validate_login_credentials.js"></script>
</body>
</html>