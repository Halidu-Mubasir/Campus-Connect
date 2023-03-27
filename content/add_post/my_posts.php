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

    $uid = $_SESSION['userId'];

    $sql = "SELECT post_id, fname as 'firstname', lname as 'lastname', title, _description as
                'description', _date as 'date', file_path as 'file' from post P, users U 
                where U.user_id = P.user_id and U.user_id = $uid order by P._date desc";

    $result = mysqli_query($conn, $sql);
    $posts = array();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $posts[] = $row;
        }
    } 

    // redirect to the page and edit a post if the edit button is clicked
    if (isset($_POST['edit'])) {

        $postId = $_POST['edit'];
        // $_SESSION['postId'] = $postId;
        $sql = "SELECT * FROM post WHERE post_id = $postId";

        $result = mysqli_query($conn, $sql);
        if ($row = $result->fetch_assoc()){
            $title = $row['title'];
            $description = $row['_description'];
            header("Location: ../edit_post/edit_post.php?title=".$title."&description=".$description."&postId=".$postId );
        }
    }

    if (isset($_POST['delete'])) {

        $postId = $_POST['delete'];

        echo "<script>". $delete = "
            confirm('Are you sure you want to delete post?')
        </script>";
       

        if ($delete == true) {
            $sql = "DELETE FROM post WHERE post_id = $postId";
            $result = mysqli_query($conn, $sql);
        } else {
            header("Location: my_posts.php");
        }
        
    }

    //close database connection
	$conn->close();
    
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Complaints - Campus Connect</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="my_posts.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../main.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
</head>
<body>
    <!-- main content -->
    <div class = "post-main">
        <div class="aside__container">
            <div class="main__logo">
                <a href="../index.php"><img src="../../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120" class="logo"></a>
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


        <!-- the header container -->
        <div class = 'main-content'>
            <div class="main__container">
                <div class="menu">
                    <i class="bi bi-list"></i>
                </div>

                <div class="index__header">
                    <!-- <div class="search">
                        <input name="search" type="text" class="search_input" id="search" placeholder="Search..." autocomplete="off">
                        <label for="search"><i class="bi bi-search"></i></label>
                    </div> -->
                    <div class="notification" id='noti-bell'>
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="account">
                        <i class="bi bi-person"></i>
                    </div>
                    
                </div>
            </div>
            
            <!-- the form that displays all my posts -->
            <form method="post">
                <div class = "button-action">
                    <a href = "../all_posts/posts.php" id = "post-action2" >All Complaints</a>
                    <a href = "" id = "post-action1">My Complaints</a>
                </div>
                
                <div class = "problems">   
                    <?php
                    // display all information in the database
                    if (empty($posts)) {
                        echo "<div style = 'text-align:center; color:red; margin-top:20%'>
                            NO COMPLAINTS POSTED...
                        </div>";
                    } else{
                        foreach($posts as $key => $value){
                    ?>
                        <!-- each post -->
                        <div class = "private">
                            <div class = "a-bug">
                                <img src= <?="../".$value['file']?> alt="no file"  id = "bug">
                                <div class = "brief_edit">
                                    <p id = "bug_name"><?= $value['title']?></p>
                                    
                                </div>
                                <div class="btns">
                                    <button class = "edit-post" name = "edit" value = <?=$value['post_id']?>>
                                        <span class="edit">Edit</span>
                                        <i class="far fa-edit fa-1x"></i>
                                    </button>

                                    <button class = "delete-post" name = "delete" value = <?=$value['post_id']?>>
                                        <span class="delete">Delete</span>
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                                <br>
                                <br>
                                <div class = "particulars">
                                    <span id = "parti"><?= $value['lastname'].' '. $value['firstname']?></span>
                                    <span id = "parti"><?= $value['date']?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                    ?>   
                </div>
            </form>
        </div> 
    </div> 

    <!-- redirect to notification page if notification bell is pressed -->
    <script>
        const noti = document.getElementById('noti-bell');
        noti.addEventListener("click", notification);

        function notification(){
            window.location = "../notifications/notifications.php"         
        }
        
        // Add an event listener to each "select-item" button
        const posts = document.querySelectorAll('.edit-post');
        posts.forEach(function(button) {
            button.addEventListener('click', function() {
                // Retrieve the ID of the clicked item from the button's data attribute
                var postId = button.dataset.post_id;
                // console.log(postId);

                // Send an AJAX request to the server to retrieve the details of the item with the given ID
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_item_details.php?id=' + postId);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Parse the JSON response from the server
                        var post = JSON.parse(xhr.responseText);

                        // Do something with the item, such as displaying it in a modal dialog
                        console.log(post);
                    } else {
                        console.log('Error: ' + xhr.status);
                    }
                };
                xhr.send();
            });
        });
    </script>
</body>
</html>