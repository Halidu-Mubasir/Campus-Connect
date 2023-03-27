<?php

if (isset($_POST['reset__submit'])) {

    require '../dbConnection/connection.php';

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    
    if (empty($password) || empty($rpassword)) {
        header("Location: create_new_password.php?error=emptyFields");
        exit();
    }
    else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])?.{8,}$/", $password)) {
        header("Location: create_new_password.php?error=invalidPassword");
        exit();
    } 
    else if ($password !== $rpassword) {
        header("Location: create_new_password.php?error=passwdsdontmatch");
        exit();
    }
    
    else {
        $current_time = date('U');

        $sql = "SELECT * FROM reset_password WHERE reset_selector=? AND reset_expires >=?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: create_new_password.php?request=failed");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "ss", $selector, $current_time);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
           
            if (!$row = mysqli_fetch_assoc($result)) {
                header("Location: reset_password.php?request=failed");
                exit();
            } 
            
            
            else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($validator, $row['reset_token']);
                echo $tokenCheck.'<br>';
                echo $row['reset_token'] . "hmmm";
                if ($tokenCheck == false) {
                    header("Location: reset_password.php?error=invalidToken");
                    exit();
                }
               
                
                else {
                    $tokenEmail = $row['reset_user_email'];
                    $sql = "SELECT * FROM reset_password WHERE reset_user_email=?";
    
                    $stmt = mysqli_stmt_init($conn);
    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: reset_password.php?request=failed");
                        exit();
                    }
                    
                    else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            header("Location: reset_password.php?request=failed");
                            exit();
                        } else {
                            $sql = "UPDATE users SET _password = ? WHERE email=?";
    
                            $stmt = mysqli_stmt_init($conn);
    
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: reset_password.php?request=failed");
                                exit();
                            }
                            else {
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $tokenEmail);
                                mysqli_stmt_execute($stmt);
    
                                $sql = "DELETE FROM reset_password WHERE reset_user_email = ?";
                                $stmt = mysqli_stmt_init($conn);
    
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: reset_password.php?request=failed");
                                    exit();
                                }
                                else { 
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: login.php?resetpassword=passwordupdated");
                                    exit();
                                }
                            }
                        }
                    }
                }
            
                
            }
            mysqli_stmt_close($stmt);
        }
    }
}
else {
    header("Location: create_new_password.php?reset=failed");
    exit();
}

?>