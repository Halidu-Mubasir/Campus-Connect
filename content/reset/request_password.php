<?php

require '../dbConnection/connection.php';

$selector = bin2hex(random_bytes(8));
$token = bin2hex(random_bytes(32));
$expires = date('U') + 36000;

$url = "create_new_password.php?selector=" . $selector . "&validator=" . $token;

$userEmail = $_POST['user_email'];
$sql = "DELETE FROM reset_password WHERE reset_user_email = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: login.php?error=sqlerror");
    exit();
} 
else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
}

$sql = "INSERT INTO reset_password (reset_user_email, reset_expires, reset_selector, reset_token) VALUES (?, ?, ?, ?);";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: login.php?request=failed");
    exit();
}
else {
    $hashed_selector = password_hash($selector, PASSWORD_DEFAULT);
    $hashed_token = password_hash($token, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $expires, $hashed_selector, $hashed_token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $to = $userEmail;
    $subject = "Reset your password for campus connect";
    $message = '<p>We received a password reset request. The link to reset your password is below. If you do not make this request, you can ignore this email.</p>';

    $message .= '<p>Here is your password reset link:<br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $header = "From: campus connect <campusconnect@gmail.com>\r\n";
    $header .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $header);


    echo $message;

    // header("Location: reset_password.php?reset=success");
}

