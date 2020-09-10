<!-- Below File is crucial for connecting each PHP script to DB, and is reusable each time -->
<?php
        $host = "eu-cdbr-west-03.cleardb.net";
        $user = "bee76eef101815";
        $pw = "d1a3df92";
        $db = "heroku_6bde9b3c8723c31";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if($conn->connect_error) {
          echo $conn->connect_error;
        }
 