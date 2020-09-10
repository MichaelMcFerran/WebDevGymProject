<!-- Important for PHP for each page connecting to DB -->
<?php
 session_start();

 //send person back if not logged in, security
if((!isset($_SESSION['client'])) &&  (!isset($_SESSION['trainer']))){
    header("location: Admin/login.php");
} 

//connects to DB
include('conn.php');
//grabs uploaded calisthenics workouts only
$workouts = "SELECT * FROM `GymafiWorkoutsUpload` WHERE workoutStyle = 'Crossfit'";

$resultWorkouts = $conn->query($workouts);

if(!$resultWorkouts){
  echo $conn->error;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrossFit Workouts</title>


    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">

    <link rel="stylesheet" href="css/style.css" type="text/css">

     	<!-- ****** faviconit.com favicons ****** -->
         <link rel="shortcut icon" href="/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="img/faviconit/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="img/faviconit/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="img/faviconit/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/faviconit/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="img/faviconit/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/faviconit/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/faviconit/favicon-16.png">
	<link rel="apple-touch-icon" href="img/faviconit/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/faviconit/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/faviconit/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/faviconit/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/faviconit/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/faviconit/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/faviconit/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/faviconit/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/faviconit/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="img/faviconit/favicon-144.png">
	<meta name="msapplication-config" content="img/faviconit/browserconfig.xml">
	<!-- ****** faviconit.com favicons ****** -->
</head>

<body>
 <!-- Navigation Bar Start -->
 <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo2.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Workouts</a>
                            <ul class="dropdown">
                                <li><a href="calisthenics.php">Calisthenics</a></li>
                                <li><a href="crossfit.php">Crossfit</a></li>
                                <li><a href="bodybuilding.php">BodyBuilding</a></li>
                            </ul>
                        </li>
                        <li><a href="trainer.php">Trainer</a></li>
                        <li><a href="client.php">Client</a></li>
                        <!-- sends to logout page -->
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </nav>
          
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Nav Bar End -->


    <!--create space away from navbar -->
    <div class="container">
        <div class="row menutop">
        </div>
    </div>

<!-- Start of Contents -->
<div class="container">

    <div class="row">

    <!-- Title -->
    <div class="col-md-8">
            <div class="BlogTitleText">
                <h1 style="color:white">CrossFit Workouts 
                </h1>
            </div>

        <!-- Automated Workout Posts with PHP -->
    <?php
        while($row = $resultWorkouts->fetch_assoc()){
            
            $name = $row['workoutname'];
            $desc = $row['description'];
            $pathdata = $row['path'];
            $username = $row['uploadedByAdmin'];
            $uploadDate = $row['date'];

    echo "<div class='card mb-4'>
        <img class='card-img-top' src='UploadWorkouts/$pathdata' alt='Card image cap'>
        <div class='card-body'>
            <h2 class='card-title'>$name</h2>
            <p class='card-text'>$desc</p>
        </div>
        <div class='card-footer text-muted'>
            Posted on $uploadDate by $username
        </div>
        </div>";
        }

    ?>
        
    </div>

    </div>
    <!-- row end -->

</div>
<!-- container end -->


</body>
    <!-- JS to load UI -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</html>