<?php

if (isset($_POST['signup-submit'])) {

    require '../dbConnection/connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty($fname) || empty($lname) || empty($dob) || empty($email) || empty($password) || empty($cpassword)) {
        header("Location: register.php?error=emptyFields&fname=".$fname."&lname=".$lname."&dob=".$dob."&email=".$email);
        exit();
    }

    else if (!preg_match("/^[A-Za-z]+$/", $fname) || !preg_match("/^[A-Za-z]+$/", $lname)) {
        header("Location: register.php?error=invalidname&dob=".$dob."&email=".$email);
        exit();
    }
    
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=invalidEmail&fname=".$fname."&lname=".$lname."&dob=".$dob);
        exit();
    } 

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])?.{8,}$/", $password)) {
        header("Location: register.php?error=invalidEmail&fname=".$fname."&lname=".$lname."&dob=".$dob."&email=".$email);
        exit();
    } 

    else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])?.{8,}$/", $password)) {
        header("Location: register.php?error=invalidPassword&fname=".$fname."&lname=".$lname."&dob=".$dob."&email=".$email);
        exit();
    }

    else if ($password !== $cpassword) {
        header("Location: register.php?error=passwdsdontmatch&fname=".$fname."&lname=".$lname."&dob=".$dob."&email=".$email);
        exit();
    } 
    
    else {
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: register.php?error=sqlerror");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../redirect/redirect_.html?signup=unsuccessful");
                exit();
            } 
            else {
                $sql = "INSERT INTO users (fname, lname, dob, email, _password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: redirect_.html?signup=unsuccessful");
                    exit();
                } 
                else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $dob, $email, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../redirect/_redirect.html?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
else {
    header("Location: register.php");
    exit();
}
