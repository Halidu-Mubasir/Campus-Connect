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

    $errors = 0;
    $uid = $_SESSION['userId'];
    
    if (isset($_POST['post'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // declaring sessions for the error messages if upload is not successful.
        $_SESSION['image_errors'] = ""; 
        $_SESSION['title'] = ""; 
        $_SESSION['description'] = ""; 

        // error message if the problem field is empty
        if ($title === "") {
            $_SESSION['title'] = "This is a required field."; 
        }
        
        // error message if the problem description is empty
        if ($description === "") {
            $_SESSION['description'] = "This is a required field."; 
        }
        //image validation
        $target_dir = "uploaded_images/";
        // file path
        $image_path = str_replace(' ', '', $_FILES["img__upload"]["name"]);
        $target_file = $target_dir.basename($image_path);
        // image file type
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // check if image has been uploaded
        if(empty($_FILES["img__upload"]["name"])){
            $errors += 1;
            $_SESSION['image_errors'] = "File cannot be empty";
        } else {
            // check if its an actual image
            $image_size =  getimagesize($_FILES["img__upload"]["tmp_name"]);
            if ($image_size == false){
                $_SESSION['image_errors'] = "File is not an image";
                $errors += 1;
            }
            // limit file size to 10MB
            if ($_FILES["img__upload"]["size"] > 100000000){
                $_SESSION['image_errors'] = "File size should be 10MB or less";
                $errors += 1;
            }
            
            // now upload the file if all requirements are fine
            if ($errors == 0 && $_POST['title'] && $_POST['description']) {
                 // upload image
                $upload_image = move_uploaded_file($_FILES["img__upload"]["tmp_name"], '../'.$target_file);
                $sql = "INSERT INTO `post` (`user_id`, `title`, `_description`, `file_path`)
                VALUES ($uid, '$title', '$description', '$target_file')";

                $result = mysqli_query($conn, $sql);

                //close database connection
                $conn->close();
                
                sleep(2);
                header("Location: ../confirm_add_post/confirm_upload.php");
            } else {
                sleep(2);
                header("Location: ../upload_fail/upload_fail.php");
            }
        }
    }
?>
