<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Connect - Reset Password</title>

    <link rel="shortcut icon" href="../../images/newlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    
    <main>
        <div class="right__container">
           <div class="container">
                <img src="../../images/Ashesi_Logo-removebg-preview.png" alt="Ashesi Logo" width="80" height="80">
                <h2>Reset your password</h2>

                <?php
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    if (isset($_GET['error'])) {
                        
                        if ($_GET['error'] == 'emptyFields') {
                            echo '<p class="error_messages">All fills are required!</p>';
                            echo '<form action="pwd_resetter.php" method="POST" novalidate>
                            <input type="hidden" name="selector" value='.$selector.'>
                            <input type="hidden" name="validator" value='.$validator.'>
                            <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                            <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                            <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <br>
                            <button class="login__btn" type="submit" name="reset__submit">
                                RESET
                            </button>
                        </form>';
                            exit();
                        } 
                        else if ($_GET['error'] == 'invalidPassword') {
                            echo '<p class="error_messages">Your password must be at least 8 characters long,<br>contains at least one number, and have a mixture of<br>uppercase and lowercase letters.</p>';
                            echo '<form action="pwd_resetter.php" method="POST" novalidate>
                            <input type="hidden" name="selector" value='.$selector.'>
                            <input type="hidden" name="validator" value='.$validator.'>
                            <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                            <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                            <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <br>
                            <button class="login__btn" type="submit" name="reset__submit">
                                RESET
                            </button>
                        </form>';
                            exit();
                        }
                        else if ($_GET['error'] == 'passwdsdontmatch') {
                            echo '<p class="error_messages">Passwords don\'t match!</p>';
                            echo '<form action="pwd_resetter.php" method="POST" novalidate>
                            <input type="hidden" name="selector" value='.$selector.'>
                            <input type="hidden" name="validator" value='.$validator.'>
                            <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                            <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                            <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <br>
                            <button class="login__btn" type="submit" name="reset__submit">
                                RESET
                            </button>
                        </form>';
                            exit();
                        }
                        else if ($_GET['request'] == 'failed') {
                            echo '<p class="error_messages">Request Failed: something wrong happened!</p>';
                            echo '<form action="pwd_resetter.php" method="POST" novalidate>
                            <input type="hidden" name="selector" value='.$selector.'>
                            <input type="hidden" name="validator" value='.$validator.'>
                            <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                            <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                            <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <br>
                            <button class="login__btn" type="submit" name="reset__submit">
                                RESET
                            </button>
                        </form>';
                            exit();
                        }
                        else if ($_GET['resetpassword'] == 'passwordupdated') {
                            echo '<div class="checked__suc"><i class="bi bi-check-circle-fill"></i></div>';
                            echo '<p class="passChange">Password Successfully Updated!</p>';
                            echo '<form action="pwd_resetter.php" method="POST" novalidate>
                            <input type="hidden" name="selector" value='.$selector.'>
                            <input type="hidden" name="validator" value='.$validator.'>
                            <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                            <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                            <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                            <br>
                            <br>
                            <button class="login__btn" type="submit" name="reset__submit">
                                RESET
                            </button>
                        </form>';
                            exit();
                        }
                    } 
                    else {
                        echo '<form action="pwd_resetter.php" method="POST" novalidate>
                        <input type="hidden" name="selector" value='.$selector.'>
                        <input type="hidden" name="validator" value='.$validator.'>
                        <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="off" autofocus>
                        <label for="email"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="rpassword" id="rpassword" placeholder="Repeat new password" required>
                        <label for="password"><img src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        <br>
                        <br>
                        <button class="login__btn" type="submit" name="reset__submit">
                            RESET
                        </button>
                    </form>';
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>