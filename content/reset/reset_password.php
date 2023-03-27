<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Account</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
</head>
<body>
    <main>
        <div class="right__container">
            <div class="container">
                <img src="../../images/Ashesi_Logo-removebg-preview.png" alt="Ashesi Logo" width="80" height="80">
                
                <h2>Enter your email</h2>
                <!-- <p>
                    A new temporary link would be send to you via your email.
                    <br>
                    Update your password after you login!
                </p> -->
                <form action="request_password.php" method="POST" novalidate>
                <input type="email" name="user_email" id="email" placeholder="Enter your email account..." required autocomplete="off" autofocus>
                <label for="email"><img src="../../assets/mdi_email.svg" width="20" height="20"></label>
                <br>
                <br>
                <button class="login__btn" type="submit" name="request-pass-submit">
                   Send
                </button>

                <?php
                    if (isset($_GET['reset'])) {
                        if ($_GET['reset'] == 'success') {
                            echo '<p class="reset">Check your email!</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>