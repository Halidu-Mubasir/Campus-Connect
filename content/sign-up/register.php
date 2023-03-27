<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Campus Connect</title>

    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    
    <main>
        <div class="container main">
            <h2>Register</h2>
            <p class="txt"><em>Please fill out all required fields!!!</em></p>

            <?php

                if (isset($_GET['error'])) {
                    $fname = $_GET['fname'];
                    $lname = $_GET['lname'];
                    $dob = $_GET['dob'];
                    $email = $_GET['email'];
                    
                    if ($_GET['error'] == 'emptyFields') {
                        echo '<p class="error_messages">All fills are required!</p>';
                        echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus value='.$fname.'>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required value='.$lname.'>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy" value='.$dob.'>
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off" value='.$email.'>
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                    
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                    } 

                    else if ($_GET['error'] == 'invalidname') {
                        echo '<p class="error_messages">Invalid Name! Only letters are allowed.</p>';
                        echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus value='.$fname.'>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy" value='.$dob.'>
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off" value='.$email.'>
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                    }

                    else if ($_GET['error'] == 'invalidEmail') {
                        echo '<p class="error_messages">Invalid email!</p>';
                        echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus value='.$fname.'>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required value='.$lname.'>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy" value='.$dob.'>
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off">
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                    
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                    }
                    else if ($_GET['error'] == 'invalidPassword') {
                        echo '<p class="error_messages">Your password must be at least 8 characters long,<br>contains at least one number, and have a mixture of<br>uppercase and lowercase letters.</p>';
                        echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus value='.$fname.'>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required value='.$lname.'>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy" value='.$dob.'>
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off" value='.$email.'>
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                    
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                    }
                    else if ($_GET['error'] == 'passwdsdontmatch') {
                        echo '<p class="error_messages">Passwords don\'t match</p>';
                        echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus value='.$fname.'>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required value='.$lname.'>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy" value='.$dob.'>
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off" value='.$email.'>
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                    
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                    }
                } else {
                    echo '<form action="validate_signup.php" method="POST" novalidate>
                        <input type="text" name="fname" class="r_input" id="fname" placeholder="First Name" required autofocus>
                        <label for="fname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="text" name="lname" class="r_input" id="lname" placeholder="Last Name" required>
                        <label for="lname"><i class="bi bi-person-fill"></i></label>
                        <br>
                        <input type="date" name="dob" class="r_input" id="dob" placeholder="mm/dd/yyyy">
                        <br>
                        <input type="email" name="email" class="r_input" id="email" placeholder="Email" required autocomplete="off">
                        <label for="email"><img class="label__img" src="../../assets/mdi_email.svg" width="20" height="20"></label>
                        <br>
                        <input type="password" name="password" class="r_input" id="password" placeholder="Password" required>
                        <label for="password"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
                        
                        <input type="password" name="cpassword" class="r_input" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword"><img class="label__img" src="../../assets/material-symbols_lock.svg" width="20" height="20"></label>
        
                    
                        <button class="signup__btn" type="submit" name="signup-submit">
                            Register
                        </button>
                        
                        <p class="signin">Already have an account? Login <a href="../login/login.php">here</a></p>
                    </form>';
                }
            ?>
        </div>
    </main>

    <script src="validate_signup_credentials.js"></script>
</body>
</html>