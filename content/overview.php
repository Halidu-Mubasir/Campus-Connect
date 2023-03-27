<?php
    session_start();
    // if user logs out, delete his session
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login/login.php");
        exit();
    }

    // if user is not created, then redirect back to the login page
    if (!isset($_SESSION['userId'])) {
        header("Location: login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abubakari Sadik Osman, Halidu Mubashir, Richard Gbamara, and Musah Inusah">
    <meta name="description" content="">
    <title>Overview - Campus Connect</title>
    <link rel="shortcut icon" href="../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
        <div class="main">
            <div class="aside__container">
                <div class="main__logo">
                    <a href="index.php"><img src="../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120" class="logo"></a>
                </div>
                <nav class="primary__navigation">
                    <div><a href="index.php"><p>Home<br><i class="bi bi-house"></i></p></a></div>
                    <div><a href="#"><p>Overview<br><i class="bi bi-graph-up-arrow"></i></p></a></div>
                    <div><a href="add_post/add_post.php"><p>Post Complaint<br><i class="bi bi-plus-square"></i></a></div>
                    <div><a href="https://www.ashesi.edu.gh" target="_blank"><p>Learn More<br><i class="bi bi-box-arrow-up-right"></i></a></div>
                    <div><a href=""><p>Get Help<br><i class="bi bi-question-circle"></i></p></a></div>
                    <div>
                        <form method="POST">
                            <button name="logout" id="logout" style="background-color: #923D41; font-size: 0.8rem; color:#fff; outline:none; border:none;">Log out<br><i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    </div>                
                </nav>
            </div>

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
                        <p style="font-size: 1rem; display: flex; justify-content: center; align-items: center;">&nbsp;
                            <i class="bi bi-moon"  style="font-size: 1rem; margin-right: 0.2rem;"></i>Light&nbsp;Mode
                        </p>
                    </div>
                    
                    <div class="dark__mode">
                        <p style="font-size: 1rem; display: flex; justify-content: center; align-items: center;">&nbsp;
                            <i class="bi bi-brightness-high" style="font-size: 1rem; margin-right: 0.2rem;"></i>Dark&nbsp;Mode
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="main__content">
            <div class="heading">
                <p>Overview</p>
            </div>
            <div class="content">
                <a href="add_post/my_posts.php" class="my__post box over">
                    <div class="icons"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                    <div class="title">My Complaints</div>
                    <!-- <div class="counter" id="my_conplaints_counter">0</div>  -->
                </a>

                <a href="all_posts/posts.php" class="all__posts box over">
                    <div class="icons"><i class="bi bi-database-fill-check"></i></div>
                    <div class="title">All Complaints</div>
                    <!-- <div class="counter" id="all_conplaints_counter">0</div> -->
                </a>
            </div>
        </div>
    </main>

    <!-- redirect to notification page if notification bell is pressed -->
    <script>
        const noti = document.getElementById('noti-bell');
        noti.addEventListener("click", notification);

        function notification(){
            window.location = "notifications/notifications.php"         
        }
    </script>
    <!-- <script src="../script/script.js"></script> -->
</body>
</html>