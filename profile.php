<?php

session_start();

require_once('connect.php');

   if(@$_SESSION["username"]) {

   	echo "welcome ".$_SESSION['username']; //shows the welcome and the username
	
?>
 
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Profile</title>
   </head>
   <body>

 	<?php include('header.php'); 
  echo "<center>";

      if (@$_GET['id']) {
        $query = "SELECT * FROM users WHERE id ='".$_GET['id']."'";   //get the ID and set each profile
        $check = mysqli_query($db, $query);

        $rows = mysqli_num_rows($check); 
         if (mysqli_num_rows($check) != 0) {
           // echo "success";  We have found the ID
             while($row = mysqli_fetch_assoc($check)){
                  echo "<h1>".$row['username']."</h1><br>";
                  echo "Date Registered: ".$row['date']."</br>";
                  echo "Email:".$row['email']."</br>";
                  echo "Replies:".$row['replies']."</br>";
                  echo "Topics created:".$row['topics']."</br>";
                  echo "Score:".$row['score']."</br>";
             }
         }else {
            echo "ID not found";   // next time change this to login.php
         }
        
      }else{
       
         header("Location: index.php");
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