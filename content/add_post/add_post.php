<?php
    session_start();
    // if user logs out, delete his session
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: ../login/login.php");
        exit();
    }

    // if user is not created, then redirect back to the login page
    if (!isset($_SESSION['userId'])) {
        header("Location: ../login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaint - Campus Connect</title>
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../main.css">
</head>
<body>

    <main>
        <div class="main">
            <div class="aside__container">
                <div class="main__logo">
                    <a href="../index.php"><img class="logo" src="../../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120"></a>
                </div>
                <nav class="primary__navigation">
                    <div><a href="../index.php"><p>Home<br><i class="bi bi-house"></i></p></a></div>
                    <div><a href="../overview.php"><p>Overview<br><i class="bi bi-graph-up-arrow"></i></p></a></div>
                    <div><a href="#"><p>Post Complaint<br><i class="bi bi-plus-square"></i></a></div>
                    <div><a href="https://www.ashesi.edu.gh" target="_blank"><p>Learn More<br><i class="bi bi-box-arrow-up-right"></i></a></div>
                    <div><a href=""><p>Get Help<br><i class="bi bi-question-circle"></i></p></a></div>
                    <div>
                        <form method="POST">
                            <button name="logout" id="logout" style="background-color: #923D41; font-size: 0.8rem; color:#fff; outline:none; border:none;">Log out<br><i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    </div>
                </nav>
            </div>

            <div class="main__container" style="display:flex; justify-content: flex-end;">
                <div class="menu">
                    <i class="bi bi-list"></i>
                </div>

                <div class="index__header" style="display:flex; justify-content: flex-end; margin-right: 1vw;">
                    <div class="notification" id='noti-bell' style="margin-right: 2vw;">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="account">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

            </div>
        </div>
        <div class="main__content post__container">
            <div class="heading" id="addp" style="margin-left:1.7rem;">Add Complaint</div>
            
            <form action="validatePost.php" method="post" enctype="multipart/form-data">
                <div class="content__form" id="content__form">
                    <div class="upload__details">
                        <div class="upload_title">
                            <label for="heading">Title:</label>
                            <br>
                            <textarea name="title" id="title" cols="36" rows="3" placeholder="Type your heading here..." style="font-size:1.2rem;"></textarea>
                        </div>
                        <div class="upload_description">
                            <label for="description">Description:</label>
                            <br>
                            <textarea name="description" id="description" cols="36" rows="9" placeholder="Type your post description here..." style="font-size:1.2rem;"></textarea>
                        </div>
                    </div>

                    <div class="upload__file">
                        <div class="upload__space" id='file' name='image' style="width: 37vw; height: 51vh; margin-top:0.6rem;">
                            <i class="bi bi-cloud-arrow-up-fill" id="space"></i>
                            <!-- <div>Drag file to upload</div> -->
                        </div>

                        <img src="#" alt="" id="preview_img_post" style="height: 54.5vh;
                        width: 37vw; border-radius: 0.3rem; display: none;">
                        <div class="my_uploads">
                            <div class="uploads">
                                <p class="hor">Upload image file: <input type="file" name="img__upload" id="img__upload" accept="image/jpeg, image/png, image/jpg"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="post__btn" name="post">POST</button>
            </form>
        </div>
    </main>

    <!-- redirect to notification page if notification bell is pressed -->
    <script>
        const noti = document.getElementById('noti-bell');
        noti.addEventListener("click", notification);

        function notification(){
            window.location = "../notifications/notifications.php"         
        }

        const upload_img_file = document.getElementById("img__upload");
        const img_upload = document.getElementById("preview_img_post");
        const space = document.getElementById("space");

        upload_img_file.onchange = (event) => {
            const [file] = upload_img_file.files;
            if (file) {
                img_upload.src = URL.createObjectURL(file);
                img_upload.style.display = "block";
                img_upload.style.marginTop = "-51vh";
                space.style.display = "none";              
            }
        }
    </script>
</body>
</php>