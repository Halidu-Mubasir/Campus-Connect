<?php
    require '../dbConnection/connection.php';

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

    // form submitted
    if (isset($_POST['submit'])){
        $title = $_POST['title']; 
        $description = $_POST['description']; 
        $postId = $_GET['postId'];

        if ($title === "" || $description === "") {
            header("Location: edit_post.php?error");
        } else {
            
            $sql = "UPDATE `post` SET `title`='$title',`_description`='$description' 
            WHERE `post_id` = $postId";
            
            $result = mysqli_query($conn, $sql);
            //close database connection
            $conn->close();
            header("Location: ../add_post/my_posts.php");
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../main.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <title>Edit Complaint</title>
</head>
<body>   
    

    <div class="aside__container">
            <div class="main__logo">
                <a href="../index.php"><img class="logo" src="../../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120"></a>
            </div>
            <nav class="primary__navigation">
                <div><a href="../index.php"><p>Home<br><i class="bi bi-house"></i></p></a></div>
                <div><a href="../overview.php"><p>Overview<br><i class="bi bi-graph-up-arrow"></i></p></a></div>
                <div><a href="../add_post/add_post.php"><p>Post Complaint<br><i class="bi bi-plus-square"></i></a></div>
                <div><a href="https://www.ashesi.edu.gh" target="_blank"><p>Learn More<br><i class="bi bi-box-arrow-up-right"></i></a></div>
                <div><a href=""><p>Get Help<br><i class="bi bi-question-circle"></i></p></a></div>
                <div>
                    <form method="POST">
                        <button name="logout" id="logout" style="background-color: #923D41; font-size: 0.8rem; color:#fff; outline:none; border:none;">Log out<br><i class="bi bi-box-arrow-right"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </div>  
    <div class="main__content post__container" >
        <div class="heading" id="addp" style="margin-left:1.7rem;">Edit Complaint</div>
        
        <form method="post">
            <div class="content__form" id="content__form">

                <div class="upload__details">
                    <?php 
                        

                        if (isset($_GET['error'])) {
                            echo '<p style="text-align:center; color: orangered;">Please fill out all fields</p>';
                            $t = "";
                            $descr = "";
                        } else {
                            $title = str_replace(' ','%20', $_GET['title']);
                            $t = str_replace('%20', ' ', $title);
                            $description = str_replace(' ','%20', $_GET['description']);
                            $descr = str_replace('%20', ' ', $description);
                        }
                    ?>
                    <div class="upload_title">
                        <label for="heading">Title:</label>
                        <br>
                        <textarea name="title" id="title" cols="35" rows="3" style="font-size:1.2rem;"><?php echo htmlspecialchars($t); ?></textarea>
                    </div>
                    <div class="upload_description">
                        <label for="description">Description:</label>
                        <br>
                        <textarea name="description" id="description" cols="35" rows="9" style="font-size:1.2rem;"><?php echo htmlspecialchars($descr); ?></textarea>
                    </div>
                </div>

                <div class="upload__file">
                    <div class="upload__space" id='file' name='image' style="width: 37vw; height:51vh; margin-top:0.7rem;">
                        <i class="bi bi-cloud-arrow-up-fill" id="space"></i>
                        <!-- <div>Drag file to upload</div> -->
                    </div>

                    <img src="#" alt="" id="preview_img_post" style="height: 54.5vh;
                    width: 37w; border-radius: 0.3rem; display: none;  margin-top:0.7rem;">
                    <div class="my_uploads">
                        <div class="uploads">
                            <p class="hor">Upload image file: <input type="file" name="img__upload" id="img__upload" accept="image/jpeg, image/png, image/jpg"></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="post__btn" name="submit" >UPDATE</button>
        </form>
    </div>

    <script>
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
</html>