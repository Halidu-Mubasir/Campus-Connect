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
        where U.user_id = P.user_id order by P._date desc";

    $result = mysqli_query($conn, $sql);
    $posts = array();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $posts[] = $row;
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
    <title>All Complaints - Campus Connect</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="posts.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../main.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
</head>
<body>
    <div class = "post-main">
        <!-- including the sidebar -->
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
        <!-- the header -->
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
            <!-- the buttons for navigating between posts -->
            <div class = "button-action">
                <a href = "" id = "post-action2">All Complaints</a>
                <a href = "../add_post/my_posts.php" id = "post-action1">My Complaints</a>
            </div>
            
            <div class = "problems">
                    <?php
                if (empty($posts)) {
                    echo "<div style = 'text-align:center; color:red; margin-top:20%'>
                        NO COMPLAINTS POSTED...
                    </div>";
                } else{
                    foreach($posts as $key => $value){
                ?>
                    <!-- each public post -->
                    <div class = "public">
                        <div class = "a-bug">
                            <img src=<?="../". $value['file']?> id = "bug">
                            <p id = "bug_name"><?= $value['title']?></p>
                            <p id="descr"><?=$value['description']?></p>
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
        </div> 
    </div> 

    <!-- redirect to notification page if notification bell is pressed -->
    <script>
        const noti = document.getElementById('noti-bell');
        noti.addEventListener("click", notification);

        function notification(){
            window.location = "../notifications/notifications.php"         
        }       
   </script>
</body>
</html>