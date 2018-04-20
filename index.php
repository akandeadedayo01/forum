<?php

session_start();

require_once('connect.php');

   if(@$_SESSION["username"]) {

   	echo "welcome ".$_SESSION['username']; //shows the welcome and the username
	
?>
 
   <!DOCTYPE html>
   <html>
   <head>
   	<title>HomePage</title>
   </head>
   <body>

 	<?php include('header.php'); ?>
   
   </body>
   </html>


<?php
    
    if (@$_GET['action']== "logout") {
    	 session_destroy();
    	 header("Location: login.php");
    }
	
}else{

  echo "You must be logged in.";
}

?>