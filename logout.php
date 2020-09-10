<!-- logging trainer/client out on clicking logout in menu-->
<?php
//crucial to start on each page
 session_start();

 //send person back if not logged in, security
 if( (!isset($_SESSION['trainer'])) || (!isset($_SESSION['client'])) ){
    header("location: Admin/login.php");
    
 }

//else{

 // remove all session variables
 session_unset();

 // destroy the session
 session_destroy();
 
header("Location: index.php")
//}

?>