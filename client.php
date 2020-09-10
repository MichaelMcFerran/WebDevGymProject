<!-- Important for PHP for each page connecting to DB -->
<?php
 session_start();

 //send person back if not logged in, security
if(!isset($_SESSION['client'])){
    header("location: Admin/login.php");
}   
     //user to be used for emails and such SQL
  $ID = $_SESSION['client'];
  $usernameC = $_SESSION['clientUsername'];

  //used for reading group messages
  $trainingType = $_SESSION['clientTraining'];

  //added for FullCalendar.JS
  include('conn.php');
    $calendarClient = "SELECT * FROM `GymafiCalendar` WHERE ReceiverUser= '$usernameC'";
  
  $resultCalC = $conn->query($calendarClient);
  
  if(!$resultCalC){
    echo $conn->error;
  }

   //connect to message table and display messages sent to client  
$messengerClient = "SELECT * FROM GymafiMessenger WHERE ReceiverUsername ='$usernameC' OR userID = '$ID' OR workoutType='$trainingType'";

 $resultmessC = $conn->query($messengerClient);
 if(!$resultmessC){
    echo $conn->error;
  }

  //added to display users progress, correct!
  $progressuser= "SELECT * FROM GymafiWeightLoss WHERE username = '$usernameC'";

  $resultprogress = $conn->query($progressuser);
  if(!$progressuser){
     echo $conn->error;
   }


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Landing Page</title>


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

    <!-- Editing Personal Details and viewing appointments -->
    <div class="container-fluid">
        <!-- Client viewing and editing personal details -->
        <div class="col loginPage">
                <div class="footer-form set-bg" data-setbg="img/crossfit.jpg">
                    <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Personal Details</h2>
                                    <h4 style="color: white" >Must enter all details even if unchanged</h4>
                                </div>
                                <form action='client.php' method='POST' enctype="multipart/form-data">
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
                                            <input type="text" placeholder="Full Name" name="fname">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Address" name="add">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Enter Type # - BodyB=1,crossFit=2,Calis=3,Trainer=4" name="train">
                                        </div>
                                        <div class="col-lg-12">
                                           
                                            <button type="updateDB" id="updateBtnT" name="updateUser">Submit Changes </button>
                                        </div>                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

<!-- Clients managing calendar and viewing appointments -->
<div class="container-fluid">
        <div class="row">
            <!-- Calendar view -->
            <div class="col-lg-6">
                    
                <div id='calendar'style="background-color:lightblue"></div>
                        
            </div>
            <div class="col-lg-6">
                    <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Manage Appointments</h2>
                                    <p>Select Appointment you want to delete</p>
                                </div>
                                 <!-- table of Clients Appointments -->
                                 <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="30%">Title</th>
                                        <th width="40%">Description</th>
                                        <th width="15%">StartDate</th>
                                        <th width="15%">EndDate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- gets data from DB table, then displays -->
                                        <?php
                                            // had to create again, as can't use same query for this and calendar entry
                                            $calendarClientTable = "SELECT * FROM `GymafiCalendar` WHERE ReceiverUser= '$usernameC' ";
  
                                            $resultCalCTable = $conn->query($calendarClientTable);
                                            
                                            if(!$resultCalCTable){
                                              echo $conn->error;
                                            }
                                          
                                            while($row1=$resultCalCTable->fetch_assoc()){
                                                
                                                //id used to get username
                                                $appointmentname =$row1['title'];
                                                $descAppoint =$row1['description']; 
                                                $startOf=$row1['startdate'];
                                                $endOf=$row1['enddate']; 
  
                                              echo "
                                              <tr>
                                              <td>$appointmentname</td> 
                                              <td>$descAppoint</td> 
                                              <td>$startOf</td>
                                              <td>$endOf</td>
                                              </tr>";
                                            
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <form action="client.php" method='POST' enctype="multipart/form-data">
                                <div class="row">
                                        <div class="col-lg-6">
                                            <p style="color:white">Enter Appointment</p>
                                                <select name="appName">
                                                
                                                <!-- gets list of appointments from dB -->
                                                <?php
                                                $applist = "SELECT DISTINCT title FROM GymafiCalendar WHERE ReceiverUser='$usernameC' ";

                                                $applistResult = $conn->query($applist);
                                                if(!$applistResult){
                                                echo $conn->error;
                                                }
                                                
                                                while ($row2 = $applistResult->fetch_assoc()){
                                                //finds row from user table
                                                $appointments = $row2['title'];
                                                echo "<option value='$appointments'>$appointments</option>";
                                                }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="deleteApp" id="deleteApp" name="deleteApp">Delete Appointment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
            </div>
        </div>
    </div>

<!-- Weight Tracker-->
<div class="container-fluid">
        <div class="row">
            <!-- progress of weight Tracking start-->
                <div class="col-lg-12">
                    <div class="footer-form set-bg" data-setbg="img/squat.jpg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Weight Tracker</h2>

                                </div>
                                     <!-- table of clients Progress -->
                                     <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="13%">User</th>
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
                                          
                                            while($row=$resultprogress->fetch_assoc()){
                                                
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
                                <form action="client.php" method='POST' enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="text" placeholder="Current weight in Kg" name="currentweight">
                                        </div>
                                        <div class="col-lg-4">
                                            <textarea placeholder="Comments" name="comment"></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="submitTarget" id="submitTarget" name="submitWeightTarget">Submit Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end of fat loss progress -->
    </div>
</div>

<!-- messenger-->
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="footer-form set-bg">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="section-title">
                                    <h2>Messenger</h2>
                                </div>
                                <table class="table table-hover table-dark">
                                    <thead>
                                        <tr >
                                        <th width="10%">From User</th>
                                        <th width="10%">To</th>
                                        <th width="60%">Message</th>
                                        <th width="20%">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- find username of sender after -->
                                        <!-- gets messages from DB, then displays messages -->
                                        <?php
                                          
                                            while($row6=$resultmessC->fetch_assoc()){
                                                
                                                //id used to get username
                                                $user =$row6['userID']; 
                                                $mess =$row6['message'];
                                                $time =$row6['Date'];
                                                $receiver=$row6['ReceiverUsername'];

                                              //gets username of user who sent message
                                              $userNAME = "SELECT DISTINCT GymafiUsers.user FROM GymafiMessenger INNER JOIN GymafiUsers
                                              ON GymafiMessenger.userID=GymafiUsers.id
                                              WHERE GymafiUsers.id = '$user' ";
  
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
                                <form action='client.php' method='POST' enctype="multipart/form-data">
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
                                            </select></p>
                                        </div>
                                        <div class="col-lg-4">
                                            <textarea placeholder="Message" name="messageP"></textarea>
                                        </div> 
                                        <div class="col-lg-4">
                                            <button type="submitMessageClient" id="submitMessageClientBtn" name="submitMessageClient">Submit Message</button>
                                        </div>                                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end of messenger -->
    </div>
</div>

    <!-- Script/PHP for calendar to input DB data -->
<script>

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
plugins: [ 'interaction', 'dayGrid' ],
editable: true,
eventLimit: true, // allow "more" link when too many events
events: [
    <?php


// now uses database data rather than manually placed data- taken from lecture about calendars
 while($row=$resultCalC->fetch_assoc()){

    $Title = $row['title'];
    $Startdate = $row['startdate'];
    $id = $row['id'];
    $Enddate = $row['enddate'];
    $desc = $row['description'];
    //unused
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
        // php for deleting Calendar Appointments
		if(isset($_POST['deleteApp'])){
			  
            //add variables for all posted data
            //added for security against SQL injections
            $appDelete =$conn->real_escape_string($_POST['appName']);

            //need to fix db add rows
            $DeleteApp = "DELETE FROM `GymafiCalendar` WHERE title = '$appDelete' AND ReceiverUser='$usernameC'";

            
			$DeleteWorkoutResult = $conn->query($DeleteApp);

			if(!$DeleteWorkoutResult){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "<p>Your appointment $appDelete was deleted.</p>";
                
            }   
            
        }
?>


    <?php
        // php for creating client fatloss plan
		if(isset($_POST['submitWeightTarget'])){
            include("./conn.php");
			  
            //add variables for all posted data
            //added for security against SQL injections
            $currentWeight =$conn->real_escape_string($_POST['currentweight']);
            $descUpdate =$conn->real_escape_string($_POST['comment']);
            $Date = date("Y-m-d");
            
            //need to fix db add rows update
           $updateWeightLossPlan = "UPDATE GymafiWeightLoss SET currentWeightKg='$currentWeight', description='$descUpdate', week='$Date'
            WHERE userName='$usernameC'";

           
			$progresspost = $conn->query($updateWeightLossPlan);

			if(!$progresspost){
				echo $conn->error;
			} else{
                //maybe post admin email or user?
                echo "$usernameC you updated your weight loss track";

                //add email feedback to admin here? check if checks for progress bar? put in progress bar
                
            } 
        }
?>

    <!-- Posting message from messenger form -->	
<?php
 
 if(isset($_POST['submitMessageClient'])){
       
     //add variables for all posted data
    //added for security against SQL injections
     $clientMessage =$conn->real_escape_string($_POST['messageP']);
     $SentToUserName =$conn->real_escape_string($_POST['userNameSend']);
     $sentFromUserID = $_SESSION['client'];
     $dateTime = date("Y-m-d H:i:s");

     $insertadminMessage = "INSERT INTO GymafiMessenger(userID, Date, message, ReceiverUsername) VALUES ('$sentFromUserID','$dateTime','$clientMessage', '$SentToUserName')";

     
     $messagepost = $conn->query($insertadminMessage);

     if(!$messagepost){
         echo $conn->error;
     } else{
         echo "Message $clientMessage sent to $SentToUserName";
         
     }   
     
 }
?>


<!-- updating useraccount details -->	
<?php

//change post to registerUser, email admin or 
if(isset($_POST['updateUser'])){
    
    include("./conn.php");
    
    //add variables for all posted data
    //added for security against SQL injections
    $username =$conn->real_escape_string($_POST['userName']);
    //  $password = $_POST['passWord'];
    $password =$conn->real_escape_string($_POST['passWord']);
    //encrypting password - doesnt work!
    //$password = (password_hash($_POST['passWord'], PASSWORD_BCRYPT));
    $email =$conn->real_escape_string($_POST['Mail']);
    $fullName =$conn->real_escape_string($_POST['fname']);
    $address =$conn->real_escape_string($_POST['add']);
    $trainingID =$conn->real_escape_string($_POST['train']);
    //added has for encryption, hides password in database
   // $hash = (md5(rand(0,1000)));

    // $insertUser = "UPDATE GymafiUsers(user,pass,email,admin,fullName,address,trainingID,hash) VALUES ('$username','$password','$email','$admin','$fullName','$address','$trainingID', '$hash')";

    $updateUser = "UPDATE GymafiUsers SET user = '$username', pass ='$password', email = '$email', fullName = '$fullName', address = '$address', trainingID = '$trainingID'
    WHERE id = '$ID' ";



    
    $result = $conn->query($updateUser);

    if(!$result){
        echo $conn->error;
    } else{
        echo "User named $fullName has been updated.";
        
        //send verification email to user
        $email_user = $email;
        $subject = "Account Updated";
        $message = "$fullName you have successfully updated your personal details.";

        mail($email_user, $subject, $message);

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