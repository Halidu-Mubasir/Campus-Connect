<?php
    require '../dbConnection/connection.php';

    if (isset($_POST['login-submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            header("Location: login.php?error=emptyFields&email=".$email);
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: login.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    $validate_password = password_verify($password, $row['_password']);
                    if ($validate_password == false) {
                        header("Location: login.php?error=invalidPassword&email=".$email);
                        exit();
                    } else if ($validate_password == true) {

                        if ($row["user_status"] == 2){
                            header(("Location: ../all_posts/posts.php"));
                            exit();
                        }

                        /* This is creating a session for the user. */
                        session_start();
                        $_SESSION['userId'] = $row['user_id'];
                        $_SESSION['userStatus'] = $row["user_status"];
                        $_SESSION['userRole'] = $row["user_role"];

                        if ($_SESSION['userRole'] == 1) {
                            header("Location: ../index.php?login=success");
                            exit();
                        } else {
                            header('Location: ../overview.php');
                            exit();
                        } 
                    } else {
                    header("Location: login.php?error=invalidInputs");
                    exit();
                    }
                } else {
                    header("Location: login.php?error=invalidInputs");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("Location: login.php");
        exit();
    }
?>