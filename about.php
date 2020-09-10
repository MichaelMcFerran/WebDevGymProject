<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMAFI-About Us</title>


    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
   

    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

    	<!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="img/faviconit/favicon.ico">
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

    <!-- for the gallery of images -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


</head>

<body>
    <!-- Navigation Bar Start -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.php">
                    <img src="img/logo2.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="./about.php">About</a></li>
                        <li><a href="#">Workouts</a>
                            <ul class="dropdown">
                                <li><a href="./calisthenics.php">Calisthenics</a></li>
                                <li><a href="./crossfit.php">Crossfit</a></li>
                                <li><a href="./bodybuilding.php">BodyBuilding</a></li>
                            </ul>
                        </li>
                        <li><a href="trainer.php">Trainer</a></li>
                        <li><a href="client.php">Client</a></li>
                        <li><a href="./Admin/login.php">Login</a></li>
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

    <!-- section for trainer intro/photo gallery -->
    <div class="container-fluid">
            <div class="row">
            <div class="col-lg-6">
                    <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Michael Mc Ferran- Owner</h2>
                                    <h3 style="color:#5b6269">Tomorrow isn't promised, so let us help you with your fitness goals today. My whole
                                    life is built around fitness, as it promotes positivity physically, mentally and
                                    through all aspects of my life. My passion is helping people realise this and 
                                    putting it in practice. 
                                    All the Best,
                                     Michael - Owner of
                                     Gymafi, Belfast</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                         <!-- added fancybox from ormeau library lecture -->
                     <p class="imglist" style="max-width: 520px;">
                            <a data-fancybox-trigger="preview" href="javascript:;" >
                                <img src="./img/profilephotoprievew.jpg" />
                            </a>

                            <a data-caption="Profile Photo" href="./img/profilephotobig.jpg" data-fancybox="preview" data-width="1500" data-height="1000">
                                <img src="./img/profilephotosmall.jpg" />
                            </a>

                            <a  data-caption="Crossfit" href="./img/crossfitbig.jpg" data-fancybox="preview" data-width="1500" data-height="1000">
                                <img src="./img/crossfitthumbnail.jpg" />
                            </a>
                            
                            <a  data-caption="BobyBuilding" href="./img/squatbig.jpg" data-fancybox="preview" data-width="1500" data-height="1000">
                                <img src="./img/squatthumbnail.jpg" />
                            </a>

                            <a  data-caption="Calisthenics" href="./img/ringMuscleUpBig.jpg" data-fancybox="preview" data-width="1500" data-height="1000">
                                <img src="./img/ringMuscleUpThumbnail.png" />
                            </a>
                            <a data-fancybox href="https://www.youtube.com/watch?v=atauWwjTg0U"> Resistance Bands Video
                            </a>
                            </p>
                </div>
               
            </div>
        </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                    <div class="footer-form set-bg" data-setbg="img/squat.jpg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Contact Form</h2>
                                    <p>Feel free to reach out to me below with any queries, 
                                    and I will get in touch. And remember, Stay Fit! </p>
                                </div>
                                <form action="#" method='POST' enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Name" name="name3">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Email" name="email3">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" placeholder="Subject" name="subject3">
                                            <textarea placeholder="Message" name="body3"></textarea>
                                            <button type="submitInterest3" id="registerInterestBtn3" name="registeringInterest">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="map-location">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2312.852038465756!2d-5.974364484115035!3d54.571359380254044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108a0080eec35%3A0x9027d28ca7db7e7d!2s99A%20Stockmans%20Ln%2C%20Belfast%20BT9%207JD!5e0!3m2!1sen!2suk!4v1586364860999!5m2!1sen!2suk" style="border:0;" allowfullscreen=""></iframe>

                    </div>  
                </div>
               
            </div>
        </div>

<?php

if(isset($_POST['registeringInterest'])){

//send email to admin from interested person
                 $Name = $_POST['name3'];
                 $email_user = $_POST['email3'];
                 $subject = $_POST['subject3'];
                 $message = $_POST['body3'];

                // // //admin details, only one admin but can be expanded
                  $adminemail = "mmcferran628@qub.ac.uk";
                //  //$adminmessage = "Test";
                  $adminmessage = "$Name has sent you a message. Contact on $email_user - $message";
               

                  mail($adminemail, $subject, $adminmessage);

                  //mail potential user for registering interest

                  $usermessage= "Thanks for getting in touch - someone will speak with you soon.
                  Or else email our admin at $adminemail directly. Stay FIT!";
                  mail($email_user, $subject, $usermessage);
                //may not be needed
                session_destroy(); 
}

?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.fancybox.min.js"></script>

    
</body>

</html>