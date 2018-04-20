<?php

session_start();

require_once('connect.php');

   if(@$_SESSION["username"]) {

   	echo "welcome ".$_SESSION['username']; //shows the welcome and the username
	
?>
 
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Member Page</title>
   </head>
   <body>

 	<?php include('header.php');
 
    echo "<center><h1>Members</h1>"; 
      $query = "SELECT * FROM users";
      $check = mysqli_query($db, $query);

       $rows = mysqli_num_rows($check); 

       while($row = mysqli_fetch_assoc($check)){

                 $id = $row['id'];
            echo "<a href='profile.php?id=$id'> ".$row['username']. "</a></br>";
       }


    echo "</center>";


   ?>
   
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