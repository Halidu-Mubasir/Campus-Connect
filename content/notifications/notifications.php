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

    $sql = "SELECT * FROM `notification` order by `_date`";
    $result = mysqli_query($conn, $sql);
    $notifications = array();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $notifications[] = $row;
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
     <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    
    <link rel="stylesheet" href="../main.css">
    <link rel="shortcut icon" href="../../images/newlogo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="notifications.css?v=<?php echo time(); ?>">
    <title>Notifications - Campus Connect</title>
</head>
<body>
    <div class = "home-page-main">
        <!-- including the sidebar -->
        <div class="aside__container">
            <div class="main__logo">
                <a href="../index.php"><img src="../../images/newlogo-removebg-preview.png" alt="Ashesi Logo" width="130" height="120" class="logo"></a>
            </div>

            <nav class="primary__navigation">
                <div><a href="../index.php"><p>Home<br><i class="bi bi-house"></i></p></a></div>
                <div><a href="../overview.php"><p>Overview<br><i class="bi bi-graph-up-arrow"></i></p></a></div>
                <div><a href="../add_post/add_post.php"><p>Post Compliant<br><i class="bi bi-plus-square"></i></a></div>
                <div><a href="https://www.ashesi.edu.gh" target="_blank"><p>Learn More<br><i class="bi bi-box-arrow-up-right"></i></a></div>
                <div><a href=""><p>Get Help<br><i class="bi bi-question-circle"></i></p></a></div>
                <div>
                    <form method="POST">
                        <button name="logout" id="logout" style="background-color: #923D41; font-size: 0.8rem; color:#fff; outline:none; border:none;">Log out<br><i class="bi bi-box-arrow-right"></i></button>
                    </form>
                </div>           
            </nav>
        </div>

        <div class = "main-content">
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
            <div id = "dashboard-header"> Notifications</div>       

            <div class = "content-info">
                <form method = "POST">
                    <?php 
                        foreach($notifications as $key => $value){
                    ?>
                        <div class = "notifications">
                            <div class = "notifi">
                                <div class = "name-section">
                                    <div class = "name"><?=$value['sender_name']?></div>
                                    <small><?=$value['date_']?></small>
                                </div>
                                <div class = "sub-delete">
                                    <div class = subject><?=$value['subject']?></div>
                                    <button name = "delete-notification" class = "noti-delete" value = <?=$value['notification_id']?>>
                                        <i class="fas fa-trash" style = "color:rgba(0,0,0,0.5)"></i>
                                    </button>
                                </div>
                                <div class = "main">
                                    <?=$value['content']?>  
                                </div>
                            </div>
                        </div>
                        <?php 
                    }?>
                </form>
            </div> 
        </div>   
    </div>
</body>
</html>