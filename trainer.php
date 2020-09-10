<!-- Important for PHP for each page connecting to DB -->
<?php
 session_start();

 //send person back if not logged in, security
if(!isset($_SESSION['trainer'])){
	header("location: Admin/login.php");
}
 //set admin user to be used for emails and such SQL
  $id = $_SESSION['trainer'];

  $usernameA = $_SESSION['trainerUsername'];

//added for FullCalendar.JS
include('conn.php');
$calendar = "SELECT * FROM GymafiCalendar";

$resultCal = $conn->query($calendar);

if(!$resultCal){
  echo $conn->error;
}

 //connect to message table and dispaly all messages as admin, changed so only shows messages to/from admin
 $messenger = "SELECT * FROM GymafiMessenger WHERE  userID = '$id' OR ReceiverUsername ='$usernameA'";

 $resultmess = $conn->query($messenger);
 if(!$resultmess){
    echo $conn->error;
  }
  //Used to populate client progress tracker list
  $progress = "SELECT * FROM GymafiWeightLoss" ;

  
   $resultprog = $conn->query($progress);
   if(!$resultprog){
      echo $conn->error;
    }

//used to populate workout upload table
$workouts = "SELECT * FROM GymafiWorkoutsUpload" ;

$resultworkouts = $conn->query($workouts);
if(!$resultworkouts){
   echo $conn->error;
 }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Landing Page</title>


    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
   

    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <!-- Css for calendar -->
    <link href='FullCalendar/packages/core/main.css' rel='stylesheet' />
    <link href='FullCalendar/packages/daygrid/main.css' rel='stylesheet' />


    <!-- end of css -->

    <!-- JS for fullCalendar -->
    <script src='FullCalendar/packages/core/main.js'></script>
    <script src='FullCalendar/packages/interaction/main.js'></script>
    <script src='FullCalendar/packages/daygrid/main.js'></script>

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
                        <!-- sends user to logout page -->
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
          
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Nav Bar End -->

    <!-- Form for registering user-->

    <div class="container-fluid">
            <div class="col loginPage">
                
                    <div class="footer-form set-bg" data-setbg="./img/crossfit.jpg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Register new Client</h2>
                                </div>
                                <form action='trainer.php' method='POST' enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <input type="text" placeholder="User Name" name="userName">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="password" name="passWord">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Email" name="Mail">
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Trainer enter 1 or client enter 0" name="adm">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Full Name" name="fname">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Address" name="add">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Enter Type # - BodyB=1,crossFit=2,Calis=3,Trainer=4" name="train">
                                        </div>
                                        <div class="col-lg-12">
                                           
                                            <button type="submitDB" id="registerBtnT" name="registerUser">Submit To Database </button>
                                        </div>                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
    </div>

<!-- posting appointments to clients in calendar and viewing appointments -->
    <div class="container-fluid">
        <!-- Admin posting appointments to clients -->
            <div class="row">
                <!-- Calendar view -->
                <div class="col-lg-6">
                
                    <div id='calendar'style="background-color:lightblue"></div>
                 
                </div>
                <div class="col-lg-6">
                    <!-- <div class="footer-form set-bg" data-setbg="img/squat.jpg"> -->
                    <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Create Appointment/Schedule</h2>
                                    <p>Enter Client appointment/ Schedules below. Remember start date first then end date.</p>
                                </div>
                                <form action="trainer.php" method='POST' enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="title" name="titleP">
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="userNameP">
                                            <!-- populating help from https://www.youtube.com/watch?v=TNPxG2yrPlM -->
                                            <?php
                                            $userlist = "SELECT DISTINCT user FROM GymafiUsers";

                                            $userlistResult = $conn->query($userlist);
                                            if(!$userlistResult){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row3 = $userlistResult->fetch_assoc()){
                                            //finds row from user table
                                            $usernames = $row3['user'];
                                            echo "<option value='$usernames'>$usernames</option>";
                                            }
                                            ?>

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="date" title="start date" name="startdateP">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="date" title="end date" name="enddateP">
                                        </div>

                                        <div class="col-lg-12">
                                            <textarea placeholder="Description" name="descP"></textarea>
                                            <button type="submitAppointmentAdmin" id="registerAppointmentAdminBtn" name="registeringAppointment">Submit appointment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        
    <!-- added closing tag -->
    </div>


    
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6">
                    <div class="footer-form set-bg" data-setbg="img/ringMuscleUp.png">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2> Uploaded Workout Plans</h2>
                                </div>
                                     <!-- table of uploaded Workout Content -->
                                     <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="55%">Workout Name</th>
                                        <th width="15%">Workout Type</th>
                                        <th width="15%">Uploaded By</th>
                                        <th width="15%">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- gets data from DB table, then displays -->
                                        <?php
                                          
                                            while($row=$resultworkouts->fetch_assoc()){
                                                
                                                //id used to get username
                                                $workoutName =$row['workoutname'];
                                                $workoutType =$row['workoutStyle']; 
                                                $uploadedBy=$row['uploadedByAdmin'];
                                                $DateUpload=$row['date']; 
  
                                              echo "
                                              <tr>
                                              <td>$workoutName</td> 
                                              <td>$workoutType</td> 
                                              <td>$uploadedBy</td>
                                              <td>$DateUpload</td>
                                              </tr>";
                                            
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end of workout Upload -->
           <!-- form for weight plan start-->
            <div class="col-lg-6">>
            <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Manage Workout Content</h2>
                                </div>
                                <!-- form used to upload data to workout pages -->
                                <form action="trainer.php" method='POST' enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <p style="color:white">Enter Workout Style
                                                <select name="workoutStyleSelect">
                                                
                                                <!-- gets list of workout styles from dB -->
                                                <?php
                                                $stylelist = "SELECT DISTINCT workoutName FROM GymafiTraining";

                                                $stylelistResult = $conn->query($stylelist);
                                                if(!$stylelistResult){
                                                echo $conn->error;
                                                }
                                                
                                                while ($row = $stylelistResult->fetch_assoc()){
                                                //finds row from user table
                                                $workoutTypes = $row['workoutName'];
                                                echo "<option value='$workoutTypes'>$workoutTypes</option>";
                                                }
                                                ?>
                                                </select></p>
                                            <input type="text" placeholder="Name of workout" name="workoutname">
                                            <input type="file" placeholder="file" name="upload"> 
                                        </div>
                                        <div class="col-lg-6"> 
                                            <textarea placeholder="Description of Workout" name="description"></textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submitWorkout" id="submitWorkout" name="submitWorkout">Submit Workout</button>
                                        </div>
                                        <!-- new row for delete function -->
                                        <div class="col-lg-6">
                                                   <!-- /added for delete function -->
                                                   <p style="color:white">Select Workout to delete
                                            <select name="DeleteWorkoutName">
                                            
                                            <!-- gets list of workouts uploaded by admin from dB -->
                                            <?php
                                            $workoutlist = "SELECT * FROM `GymafiWorkoutsUpload` WHERE uploadedByAdmin='$usernameA'";

                                            $workoutlistResult = $conn->query($workoutlist);
                                            if(!$workoutlistResult){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row = $workoutlistResult->fetch_assoc()){
                                            //finds row from user table
                                            $workoutSelect = $row['workoutname'];
                                            echo "<option value='$workoutSelect'>$workoutSelect</option>";
                                            }
                                            ?>

                                            </select></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="deleteWorkout" id="deleteWorkout" name="deleteWorkout">Delete Workout</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- form for weight plan end-->
           
        <div>
    </div>

    <div class="container-fluid">
        <div class="row">
                 <!-- progress of fat loss start-->
                 <div class="col-lg-6">
                    <div class="footer-form set-bg" data-setbg="img/squat.jpg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Create Weight Tracker</h2>

                                </div>
                                     <!-- table of clients fatLoss Progress -->
                                     <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="13%">Client</th>
                                        <th width="14%">Starting Weight</th>
                                        <th width="13%">Current Weight</th>
                                        <th width="13%">Target Weight</th>
                                        <th width="35%">Comments</th>
                                        <th width="12%">Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- gets progress from DB table, then displays -->
                                        <?php
                                          
                                            while($row=$resultprog->fetch_assoc()){
                                                
                                                //id used to get username
                                                $user =$row['userName'];
                                                $startingW =$row['startingWeightKg']; 
                                                $CurrentW =$row['currentWeightKg']; 
                                                $TargetW =$row['targetWeightKg'];  
                                                $mess =$row['description'];
                                                $Date =$row['week'];
                                                

  
                                              echo "
                                              <tr>
                                              <td>$user</td> 
                                              <td>$startingW</td> 
                                              <td>$CurrentW</td>
                                              <td>$TargetW</td>
                                              <td>$mess</td>
                                              <td>$Date</td>
                                              </tr>";
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- end of fat loss progress -->

            <!-- form for weight plan start-->
            <div class="col-lg-6">
            <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Manage Client Weight Tracker</h2>
                                </div>
                                <form action="trainer.php" method='POST' enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-lg-12">
                                        <p>Enter Client
                                            <select name="userNameClient">
                                            <?php
                                            $userlist = "SELECT DISTINCT user FROM GymafiUsers";

                                            $userlistResult = $conn->query($userlist);
                                            if(!$userlistResult){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row = $userlistResult->fetch_assoc()){
                                            //finds row from user table
                                            $usernames = $row['user'];
                                            echo "<option value='$usernames'>$usernames</option>";
                                            }
                                            ?>

                                            </select></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="starting weight in Kg" name="startingweight">
                                            <input type="text" placeholder="Target weight in Kg" name="targetweight">
                                        </div>
                                        <div class="col-lg-6">
                                        <textarea placeholder="Description/Advice" name="description"></textarea>
                                        </div>

                                        <div class="col-lg-3">
                                            
                                            <button type="submitTarget" id="submitTarget" name="submitWeightTarget">Submit Tracker</button>
                                        </div>

                                         <!-- new row for delete function -->
                                         <div class="col-lg-12">
                                                   <p style="color:white">Select Clients weight plan to delete
                                                   <select name="userNameClientPlan">
                                            <?php
                                            $uploadedplanlist = "SELECT DISTINCT userName FROM GymafiWeightLoss";

                                            $planlistResult = $conn->query($uploadedplanlist);
                                            if(!$planlistResult){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row = $planlistResult->fetch_assoc()){
                                            //finds row from user table
                                            $usernamesPlans = $row['userName'];
                                            echo "<option value='$usernamesPlans'>$usernamesPlans</option>";
                                            }
                                            ?>

                                            </select></p>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="deletePlan" id="deletePlan" name="deletePlan">Delete Weight Plan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- form for weight plan end-->
        <div>
    </div>

    <div class="container-fluid">
        <div class="row">
        <!-- messenger -->
        <div class="col-lg-12">
                    <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Messenger</h2>
                                </div>
                                <!-- table of messages -->
                                <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="10%">From</th>
                                        <th width="10%">To</th>
                                        <th width="60%">Message</th>
                                        <th width="20%">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- find username of sender after -->
                                        <!-- gets messages from DB, then displays messages -->
                                        <?php
                                          
                                            while($row6=$resultmess->fetch_assoc()){
                                                
                                                //id used to get username
                                                $user =$row6['userID']; 
                                                $mess =$row6['message'];
                                                $time =$row6['Date'];
                                                $receiver=$row6['ReceiverUsername'];

                                              //gets username of user who sent message
                                              $userNAME = "SELECT DISTINCT GymafiUsers.user FROM GymafiMessenger INNER JOIN GymafiUsers
                                              ON GymafiMessenger.userID=GymafiUsers.id
                                              WHERE GymafiUsers.id = '$user' ";

                                                //don't really need but leave for now
                                              $userNAMERESULT = $conn->query($userNAME);
                                              if(!$userNAMERESULT){
                                              echo $conn->error;
                                              }
  
                                              while ($row7 = $userNAMERESULT->fetch_assoc()){
                                              //finds row from user table
                                              $usernameSENDER = $row7['user'];
  
                                              echo "
                                              <tr>
                                              <td>$usernameSENDER</td> 
                                              <td>$receiver</td> 
                                              <td>$mess</td>
                                              <td>$time</td>
                                              </tr>";
                                              }
                                            }
                                        ?>

                                    </tbody>
                                </table>
                                <form action='trainer.php' method='POST' enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-lg-4">
                                    <p style="color:white">Send Message To
                                            <select name="userNameSend">
                                            <!-- populating usernames from DB-->
                                            <?php
                                            $userlistSend = "SELECT DISTINCT user FROM GymafiUsers";

                                            $userlistResultSend = $conn->query($userlistSend);
                                            if(!$userlistResultSend){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row8 = $userlistResultSend->fetch_assoc()){
                                            //finds row from user table
                                            $usernamesSend = $row8['user'];
                                            echo "<option value='$usernamesSend'>$usernamesSend</option>";
                                            }
                                            ?>

                                            </select></P>
                                            <!-- added for group messaging -->
                                            <p style="color:white">Send Group message to
                                            <select name="groupNameSend">
                                            <!-- populating usernames from DB-->
                                            <?php
                                            $grouplistSend = "SELECT DISTINCT workoutName FROM GymafiTraining";

                                            $grouplistResultSend = $conn->query($grouplistSend);
                                            if(!$grouplistResultSend){
                                            echo $conn->error;
                                            }
                                            
                                            while ($row12 = $grouplistResultSend->fetch_assoc()){
                                            //finds row from user table
                                            $groupnamesSend = $row12['workoutName'];
                                            echo "<option value='$groupnamesSend'>$groupnamesSend</option>";
                                            }
                                            ?>

                                            </select></p>
                                        </div>
                                        <div class="col-lg-4">
                                        <textarea placeholder="Message" name="messageP"></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                        <button type="submitMessageAdmin" id="submitMessageAdminBtn" name="submitMessage">Submit Message</button>
                                        <button type="submitGroupMessageAdmin" id="submitGroupMessageAdminBtn" name="submitGroupMessage">Submit Group Message</button>
                                        </div>                                  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- end of messenger -->
            
        <div>
    </div>



<!-- Script/PHP for calendar to input DB data, possibly switch around -->
<script>

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
plugins: [ 'interaction', 'dayGrid' ],
editable: true,
eventLimit: true, // allow "more" link when too many events
events: [
<?php


 //now uses database data rather than manually placed data- taken from lecture about calendars
 while($row=$resultCal->fetch_assoc()){

    $Title = $row['title'];
    $Startdate = $row['startdate'];
    $id = $row['id'];
    $Enddate = $row['enddate'];
    $desc = $row['description'];
    $user = $row['userID'];

    echo "  {'title': '$Title', 'start': '$Startdate', 'end': '$Enddate','description': '$desc'}, ";
}

?>
]
});

calendar.render();
});

</script>
<style>

body {
margin: 40px 10px;
padding: 0;
font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
font-size: 14px;
}

#calendar {
max-width: 900px;
margin: 0 auto;
}

</style>

<?php
        // php for deleting workouts
		if(isset($_POST['deleteWorkout'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $WorkoutDelete =$conn->real_escape_string($_POST['DeleteWorkoutName']);

            //need to fix db add rows
            $DeleteWorkout = "DELETE FROM `GymafiWorkoutsUpload` WHERE workoutname = '$WorkoutDelete' AND uploadedByAdmin='$usernameA'";

            
			$DeleteWorkoutResult = $conn->query($DeleteWorkout);

			if(!$DeleteWorkoutResult){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "<p>Your workout $WorkoutDelete was deleted.</p>";
                
            }   
            
        }
?>

<?php
        // php for uploading workouts, got from myfilms12 lecture
		if(isset($_POST['submitWorkout'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $uploadname =$conn->real_escape_string($_POST['workoutname']);
            $uploadstyle =$conn->real_escape_string($_POST['workoutStyleSelect']);
            $descUpload =$conn->real_escape_string($_POST['description']);
            
            $file = $_FILES['upload']['name'];

            $filetemp = $_FILES['upload']['tmp_name'];

            //passing uplaoded file into upload folder
			move_uploaded_file($filetemp, "UploadWorkouts/$file");
            $date = date("Y-m-d");

            //need to fix db add rows
            $insertWorkout = "INSERT INTO GymafiWorkoutsUpload (workoutname, description, uploadedByAdmin, path, workoutStyle, date) VALUES ('$uploadname', '$descUpload', '$usernameA', '$file', '$uploadstyle', '$date')";

            
			$insertResult = $conn->query($insertWorkout);

			if(!$insertResult){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "<p>Your workout $uploadname was uploaded.</p>";
                
            }   
            
        }
?>


<?php
        // php for creating client weight
		if(isset($_POST['submitWeightTarget'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $usernameC =$conn->real_escape_string($_POST['userNameClient']);
            $clientstartingweight =$conn->real_escape_string($_POST['startingweight']);
            $clienttargetweight =$conn->real_escape_string($_POST['targetweight']);
            $adminDescription =$conn->real_escape_string($_POST['description']);
            $date = date("Y-m-d");

            //need to fix db add rows
            $insertWeightLossPlan = "INSERT INTO GymafiWeightLoss(userName, startingWeightKg,targetWeightKg, description, week) VALUES ('$usernameC','$clientstartingweight',' $clienttargetweight','$adminDescription', '$date')";

            
			$progresspost = $conn->query($insertWeightLossPlan);

			if(!$progresspost){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "Weight Loss plan sent to $usernameC";
                
            }   
            
        }
?>

<?php
        // php for deleting weight tracker
		if(isset($_POST['deletePlan'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $planDelete =$conn->real_escape_string($_POST['userNameClientPlan']);

            //need to fix db add rows
            $DeletePlan = "DELETE FROM `GymafiWeightLoss` WHERE userName='$planDelete'";

            
			$DeletePlanResult = $conn->query($DeletePlan);

			if(!$DeletePlanResult){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "<p>Your weight tracker for $planDelete was deleted.</p>";
                
            }   
            
        }
?>



<!-- taken from class myfilms12, used to register users -->	
<?php

	
        //registerUser
		if(isset($_POST['registerUser'])){
			
			include("./conn.php");
            
            //add variables for all posted data
            //added for security against SQL injections
            $username =$conn->real_escape_string($_POST['userName']);
            $password =$conn->real_escape_string($_POST['passWord']);
            //encrypting password - doesnt work!
            //$password = (password_hash($_POST['passWord'], PASSWORD_BCRYPT));
            $email =$conn->real_escape_string($_POST['Mail']);
            $admin =$conn->real_escape_string($_POST['adm']);
            $fullName =$conn->real_escape_string($_POST['fname']);
            $address =$conn->real_escape_string($_POST['add']);
            $trainingID =$conn->real_escape_string($_POST['train']);
            //added has for encryption, hides password in database
           // $hash = (md5(rand(0,1000)));

            // $insertUser = "INSERT INTO GymafiUsers(user,pass,email,admin,fullName,address,trainingID,hash) VALUES ('$username','$password','$email','$admin','$fullName','$address','$trainingID', '$hash')";

            $insertUser = "INSERT INTO GymafiUsers(user,pass,email,admin,fullName,address,trainingID) VALUES ('$username','$password','$email','$admin','$fullName','$address','$trainingID')";

			$result = $conn->query($insertUser);

			if(!$result){
				echo $conn->error;
			} else{
                echo "User named $fullName has been added.";
                
                //send verification email to user
                $email_user = $email;
                $subject = "Thank you for joining GYMAFI";
                $message = "Together we will accomplish your fitness goals. Any issues $fullName, feel free to contact me at +447808171964";

                mail($email_user, $subject, $message);
            }
            
        }
?>

<!-- Posting message from messenger form -->	
<?php
 
		if(isset($_POST['submitMessage'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $adminMessage =$conn->real_escape_string($_POST['messageP']);
            $SentToUserName =$conn->real_escape_string($_POST['userNameSend']);
            $sentFromUserID = $_SESSION['trainer'];
            $dateTime = date("Y-m-d H:i:s");

            $insertadminMessage = "INSERT INTO GymafiMessenger(userID, Date, message, ReceiverUsername) VALUES ('$sentFromUserID','$dateTime','$adminMessage', '$SentToUserName')";

            
			$messagepost = $conn->query($insertadminMessage);

			if(!$messagepost){
				echo $conn->error;
			} else{
                echo "Message $adminMessage sent to $SentToUserName";
                
            }   
            
        }
?>

<!-- Posting group message from messenger form -->	
<?php
 
		if(isset($_POST['submitGroupMessage'])){
			  

            //added for security against SQL injections
            $adminGMessage =$conn->real_escape_string($_POST['messageP']);
            $SentToGroup =$conn->real_escape_string($_POST['groupNameSend']);
            $sentFromGUserID = $_SESSION['trainer'];
            $dateTime = date("Y-m-d H:i:s");

            $SelectGroup = "SET @group = (SELECT trainingID FROM GymafiTraining WHERE workoutName='$SentToGroup')";
            $Group = $conn->query($SelectGroup);

			if(!$Group){
				echo $conn->error;
			} else{
                
            }  

            $insertadminGMessage = "INSERT INTO GymafiMessenger(`userID`, `Date`, `message`, `workoutType`) VALUES ('$sentFromGUserID', '$dateTime','$adminGMessage', '$Group')";

            
			$Gmessagepost = $conn->query($insertadminGMessage);

			if(!$Gmessagepost){
				echo $conn->error;
			} else{
                echo "Message $adminGMessage sent to $SentToGroup";
                
            }   
            
        }
?>

<!-- PHP for admin form to submit appointments to DB -->
<?php

    if(isset($_POST['registeringAppointment'])){

        //add variables for all posted data
        //added for security against SQL injections
        $titleCreate =$conn->real_escape_string($_POST['titleP']);
        $startdateCreate =$conn->real_escape_string($_POST['startdateP']);
        $enddateCreate =$conn->real_escape_string($_POST['enddateP']);
        $descCreate =$conn->real_escape_string($_POST['descP']);
        $userNameCreate =$conn->real_escape_string($_POST['userNameP']);

        


       
        //could add admin id to this with more sql to confirm what admin created it with userID/adminid
        $insertAppointment = "INSERT INTO GymafiCalendar(startdate, enddate, title, description, ReceiverUser) VALUES ('$startdateCreate', '$enddateCreate', '$titleCreate', '$descCreate', '$userNameCreate')";

        $resultAdd = $conn->query($insertAppointment);

        if(!$resultAdd){
            echo $conn->error;
        } else {
            echo "Appointment $titleCreate added with $userNameCreate";

            //send email to admin for confirmation
            //send verification email to admin, could put in sql for admin to increase reusability if email changed by admin, add admin id check if more admin?
            // $email_ad = "SELECT DISTINCT GymafiUsers.email FROM GymafiUsers WHERE id = '$id' AND admin ='1'";
            
            // $emailresult = $conn->query($email_ad);
            // if(!$emailresult){
            // echo $conn->error;
            // }
            // //needed if row needed is on a different table than one associated with this session
            // while ($row4 = $emailresult->fetch_assoc()){
            // //finds row from user table
            // $email_admin = $row4['email'];
            // }

            $email_admin = "mmcferran628@qub.ac.uk";
            $subjectcon = "Appointment/schedule created";
            $messagebody = "You've created an appointment/ schedule with $userNameCreate, between $startdateCreate and $enddateCreate titled $titleCreate about $descCreate  ";

            mail($email_admin, $subjectcon, $messagebody);

            // //send email to user for confirmation
            // //send verification email to user
            // //finds user email that matches given userid from post, searches user table for email and sends email to them
            // $useremaildb = "SELECT DISTINCT GymafiUsers.email FROM GymafiCalendar INNER JOIN 
            // GymafiUsers
            // ON
            // GymafiCalendar.userID=GymafiUsers.id
            // WHERE GymafiCalendar.userID= '$userIdCreate' ";

            // $emailuserresult = $conn->query($useremaildb);
            // if(!$emailuserresult){
            // echo $conn->error;
            // }
            // //needed if row needed is on a different table than one associated with this session
            // while ($row5 = $emailuserresult->fetch_assoc()){
            // //finds row from user table
            // $user = $row5['email'];
            // }
            
            // $subjectconf = "Appointment/schedule created with a";
            // $messagebod = "You've been booked into an appointment/ schedule with admin, between $startdateCreate and $enddateCreate titled $titleCreate  about $descCreate  ";

            // mail($useremail, $subjectconf, $messagebod);

        }

    }

?>



</body>

    <!-- check what's used and put to top -->
    <!-- JS to load UI -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>




</html>