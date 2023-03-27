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
    <title>Confirm Upload</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../main.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="confirm_upload.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class = "add-post-main">
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
        <div class = 'main-content'>
            
            <div class="main__container">
                <div class="menu">
                    <i class="bi bi-list"></i>
                </div>

                <div class="index__header">
                    <div class="search">
                        <input name="search" type="text" class="search_input" id="search" placeholder="Search..." autocomplete="off">
                        <label for="search"><i class="bi bi-search"></i></label>
                    </div>
                    <div class="notification" id='noti-bell'>
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="account">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                <div class="theme">
                    <div class="light__mode">
                        <p style="font-size:1rem; display: flex; justify-content: center; align-items: center;">&nbsp;
                            <i class="bi bi-moon"  style="font-size:1rem; margin-right: 0.2rem;"></i>Light&nbsp;Mode
                        </p>
                    </div>
                    
                    <div class="dark__mode">
                        <p style="font-size:1rem; display: flex; justify-content: center; align-items: center;">&nbsp;
                            <i class="bi bi-brightness-high" style="font-size:1rem; margin-right: 0.2rem;"></i>Dark&nbsp;Mode
                        </p>
                    </div>
                </div>
            </div>

            <div id = "dashboard-header" class="header"> Post Complaint</div>

            <div class = "sucess-hint">
                <p id = "up_status">Post Status</p>
                <hr>
                <div class = "message">
                    <span>Post uploaded successfully </span>
                    <i class="fas fa-check"></i>
                </div>

                <p id = "direction-top">
                    However, an approval has to be granted 
                    before it is uploaded to the national domain.
                </p>
                <p id = "direction">
                    Check your notifications for updates on your posts.
                </p>
                <div class = "action-mern">
                    <button id = "another-post">Submit Another Compliant</button>
                    <button id = "posts">See Complaints</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        // getting the posts in the html
        const another_post = document.getElementById('another-post');
        const posts = document.getElementById('posts');

        // adding an event listener to the post
        another_post.addEventListener("click", post);
        posts.addEventListener("click", allPost);

        //redirecting to the various posts pages
        function post(){
            window.location = "../add_post/add_post.php"         
        }
        
        function allPost(){
            window.location = "../add_post/my_posts.php"         
        }

        const noti = document.getElementById('noti-bell');
        noti.addEventListener("click", notification);

        function notification(){
            window.location = "../notifications/notifications.php"         
        }
    </script>
</body>
</html>