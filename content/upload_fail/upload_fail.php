<?php 
    session_start();

    // if user is not created, then redirect back to the login page
    if (!isset($_SESSION['userId'])) {
        header("Location: ../login/login.php");
    }
    if(isset($_POST['back'])) {
        sleep(2);
        header("Location: ../add_post/add_post.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload_fail.css?v=<?php echo time(); ?>">
    <title>Registration Successful</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="main_pw">
        <div class = "main_info">
            <form action="" method = "POST" class = "form_fp">
                <div class = "item">
                    <img src="../../assets/dark_logo_finale.png" id = "logo_f">
                </div>
                <div class = "item" id = "yourIn">
                    Post Upload Fail
                </div>
                <div class = "item" id = "info">
                    <i class="fas fa-times-circle fa-4x"></i>
                </div>
                <div class = "item">
                    <button id = "next" name= "back"> Back</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>