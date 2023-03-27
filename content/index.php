<?php
    require 'dbConnection/connection.php';
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
    <title>Dashboard-Campus Connect</title>
    <link rel="shortcut icon" href="../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="main.css">
    <style>
        .account:hover > #details {
            display:inline;
        }
    </style>
</head>
<body>
    <main>
        <div class="main">
            <div class="aside__container">
                <div class="main__logo">
                    <a href="#"><img src="../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120" class="logo"></a>
                </div>
                <nav class="primary__navigation">
                    <div><a href="#"><p>Home<br><i class="bi bi-house"></i></p></a></div>
                    <div><a href="overview.php"><p>Overview<br><i class="bi bi-graph-up-arrow"></i></p></a></div>
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
                    <div class="account" id="account">
                        <i class="bi bi-person"></i>
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
        </div>
        <div class="main__content">
            <div class="heading">
                <p>Dashboard</p>
                <div class="details" id="details" style="display: none; flex-direction:column; width: 18vw; height: 30vh; float: right; background-color: #F7F7F7; border-radius: 0.5rem; margin-top: -8vh; margin-right: 2rem; align-items: center;">
                    <p style="text-align: center; font-size:1.2rem; margin: 0.3rem 0;">My Account</p>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            $uid = $_SESSION['userId'];
                            $sql = "SELECT * FROM users WHERE user_id = $uid";

                            $result = mysqli_query($conn, $sql);
                            if ($row = $result->fetch_assoc()){
                                $firstname = $row['fname'];
                                $lastname = $row['lname'];
                                $email = $row['email'];

                                echo '<p style="text-align: center; font-size:1rem; margin: 0.3rem 0; font-weight:500;">
                                ' .$firstname . ' ' . $lastname . '</p>';
                                echo '<p style="text-align: center; font-size:1rem; margin: 0.2rem 0; font-weight:300; color:#333; margin-top: -0.3 rem;">' . $email . '</p>';
                    
                            }
                        }
                    ?>
                    
                    <a href="" ><p style="width: 50px; height: 50px; border-radius: 25px; background-color: gray; color: #333; opacity: 0.2; text-align: center; display:flex; align-items:center; justify-content:center; margin-top: 0.5rem;"><i class="bi bi-person"></i></p></a>
                    <a href="" style="text-align: center;  font-size:0.7rem; color: blue; text-decoration: none; margin-top:0.3rem;">Edit</a>
                </div>
            </div>
            
            <div class="content" id="content">
                <a href="add_post/my_posts.php" class="my__post box">
                    <div class="icons"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                    <div class="title">My Complaints</div>
                </a>
                <a href="add_post/add_post.php" class="upload box">
                    <div class="icons"><i class="bi bi-cloud-plus-fill"></i></div>
                    <div class="title">Upload Complaint</div>
                </a>
                <a href="all_posts/posts.php" class="all__posts box">
                    <div class="icons"><i class="bi bi-database-fill-check"></i></div>
                    <div class="title">All Complaints</div>
                </a>
                <a href="https://www.ashesi.edu.gh/stories-and-events/stories.html" class="news box" target="_blank">
                    <div class="icons"><i class="bi bi-newspaper"></i></div>
                    <div class="title">Ashesi News</div>
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

        const account = document.getElementById('account');
        const account_details = document.getElementById('details');
        const acc = localStorage.getItem("acc");

        // Set Account Mode
        const enableAcc = () => {
            account_details.style.display = "flex";
            mode = localStorage.setItem("acc", "enabled");
        }

        // Disable Account Mode
        const disableAcc = () => {
            account_details.style.display = "none";
            mode = localStorage.setItem("acc", null);
        }

        account.addEventListener("click", () => {
            let mode = localStorage.getItem("acc");
            if (mode !== "enabled")
                enableAcc();
            else {
                disableAcc();
            }
        })

    </script>

</body>
</html>