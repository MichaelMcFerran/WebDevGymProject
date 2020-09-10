<!-- Important for PHP for each page connecting to DB -->
<?php
 session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- Css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
   

    <link rel="stylesheet" href="../css/style.css" type="text/css">

        	<!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="../img/faviconit/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="../img/faviconit/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="../img/faviconit/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="../img/faviconit/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../img/faviconit/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="../img/faviconit/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../img/faviconit/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/faviconit/favicon-16.png">
	<link rel="apple-touch-icon" href="../img/faviconit/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../img/faviconit/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../img/faviconit/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../img/faviconit/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../img/faviconit/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../img/faviconit/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../img/faviconit/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../img/faviconit/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../img/faviconit/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="../img/faviconit/favicon-144.png">
	<meta name="msapplication-config" content="../img/faviconit/browserconfig.xml">
	<!-- ****** faviconit.com favicons ****** -->

</head>

<body>
 <!-- Navigation Bar Start -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="../index.php">
                    <img src="../img/logo2.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="../index.php">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li><a href="#">Workouts</a>
                            <ul class="dropdown">
                                <li><a href="../calisthenics.php">Calisthenics</a></li>
                                <li><a href="../crossfit.php">Crossfit</a></li>
                                <li><a href="../bodybuilding.php">BodyBuilding</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
          
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Nav Bar End -->

    <section class="loginForm"> 
    <!-- Form for login-->
                <div class="col loginPage">
        
                    <div class="footer-form set-bg" data-setbg="../img/squat.jpg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Login Below</h2>
                                </div>
                                <form action='login.php' method='POST'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Username" name="usern">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Password" name="passphrase">
                                        </div>
                                        <div class="col-lg-12">
                                        <button type="Register" id="registerBtn">
                                            <!-- send user to register page using hyperlink -->
                                             <a href="../about.php" style="color:white">Register</a></button>
                                        <button type="Login" id="loginBtn" value="login" name="requestlogin">Login </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</section>

<!-- taken from class myfilms12 -->
<?php
		
		if(isset($_POST['requestlogin'])){
			
			include("../conn.php");
			
            // $user = $_POST['usern'];
            //added for security against SQL injections
            $user =$conn->real_escape_string($_POST['usern']);

            //adding in pass post variable
            // $password = $_POST['passphrase'];
            //added for security against SQL injections
            $password =$conn->real_escape_string($_POST['passphrase']);
            

            //now checking user for both username and password, works in mySQL,!
            $checkuser = "SELECT * FROM GymafiUsers WHERE user = '$user' AND pass = '$password'";
            //added
            //   $checkuser = "SELECT * FROM GymafiUsers WHERE user = '$user'";

            $result = $conn->query($checkuser);
            
              //verifying password - added
            // $passcheck = $result->fetch-assoc();
            // if(password_verify($_POST['passphrase'], $passcheck['passphrase'])){
            //     echo "<p> Well done correct </p>";
            // }

            if(!$result){    

                echo $conn->error;
                echo "<p>You've entered the wrong UserName or Password</p>";
            }

            //admin check
            $checkadmin = "SELECT * FROM GymafiUsers WHERE user = '$user' AND pass = '$password' AND admin ='1'";
            //result admin
            $resultadmin = $conn->query($checkadmin);

            //now checking if trainer/admin, sending to correct place if so
            $numadmin = $resultadmin->num_rows;

            //send to admin/trainer page if 3 columns are correct
            if($numadmin > 0){
                while ($row = $result->fetch_assoc()){
                 
                    //checks row against row in DB
                        $trainerID = $row['id'];
                        //adding in for username access
                        $usernameAdmin = $row['user'];
                        //creates session based on  who is using the system
                        $_SESSION['trainer'] = $trainerID;
                        //adding in
                        $_SESSION['trainerUsername'] = $usernameAdmin;
                        

                      
                  }
                //   header("location: ../trainer.php");
                 //fixed with stack overflow header error help
                  //https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
                echo("<script>location.href = '../trainer.php?msg=$msg';</script>");
                  
                }else{
                  
                  //echo "<p>user does not exist</p>";
              }

            //user/client check
            $checkclient = "SELECT * FROM GymafiUsers WHERE user = '$user' AND pass = '$password' AND admin ='0'";
            //result admin
            $resultclient = $conn->query($checkclient);
            //now checking if trainer/admin, sending to correct place if so
            $numclient= $resultclient->num_rows;

            //send to admin/trainer page if 3 columns are correct
            if($numclient > 0){
                while ($row = $resultclient->fetch_assoc()){
                 
                    //checks row against row in DB


                        $clientID = $row['id'];
                        //adding in for username access
                        $usernameClient = $row['user'];

                        $TrainingClient = $row['trainingID'];
                        //creates session based on  who is using the system
                        $_SESSION['client'] = $clientID;
                        //adding in
                        $_SESSION['clientUsername'] = $usernameClient;

                        $_SESSION['clientTraining'] = $TrainingClient;
                        
                        //header("location: ../client.php"); 
                  }

                  //header("location: ../client.php"); 
                  //fixed with stack overflow header error help
                  //https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
                  echo("<script>location.href = '../client.php?msg=$msg';</script>");

                }else{
                  
                  //echo "<p>user does not exist</p>";
              }
            }
	 ?>
    
</body>

    <!-- check what's used and put to top , jquery must go first-->
    <!-- JS to load UI -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>


</html>