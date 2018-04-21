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
  
 	<?php include('header.php'); ?>

   <body>
   <center>

  <?php
       $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";  // we are trying to create profile here 
       $check = mysqli_query($db, $query);

       $rows = mysqli_num_rows($check); 

       while($row = mysqli_fetch_assoc($check)){
        $username = $row['username'];
        $id = $row['id'];
        $email = $row['email'];
        $date = $row['date'];
        $replies = $row['replies'];
        $score = $row['score'];
        $topics = $row['topics'];
       }

  ?>
   
  
     
     Username: <?php echo $username; ?> </br>
     ID: <?php echo $id; ?> </br>
     Email: <?php echo $email; ?> </br>
     Date Registered: <?php echo $date; ?> </br>
     Replies: <?php echo $replies; ?> </br>
     Score(scr): <?php echo $score; ?> </br>
     Topics: <?php echo $topics; ?> </br> </br>


     <a href="account.php?action=cp">Change Password</a>

    </center>
   </body>

   

   </html>


<?php
    
    if (@$_GET['action']== "logout") {
    	 session_destroy();
    	 header("Location: login.php");
    }

   if(@$_GET['action'] == "cp"){
     
     echo "<form action = 'account.php?action=cp' method = 'POST'><center></br>";
     echo "

     current password: <input type= 'text' name='curr_pass'></br></br>
     New password: <input type= 'password' name='new_pass'></br></br>
     Re-type password: <input type ='password' name='re_pass'></br></br>

     <input type='submit' name ='change_pass' value = 'Change'>



     ";
    }

     
     $curr_pass = @$_POST['curr_pass'];
     $new_pass = @$_POST['new_pass'];
     $re_pass = @$_POST['re_pass'];
     


     if(isset($_POST['change_pass'])){

      $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";  // we are trying to create profile here 
       $check = mysqli_query($db, $query);

       $rows = mysqli_num_rows($check); 

       while($row = mysqli_fetch_assoc($check)){
         
         //  echo $row['password'];
          $get_pass = $row['password'];
                

           } 
           if(sha1($curr_pass)== $get_pass){

            if(strlen($new_pass) > 6) {
              if($re_pass == $new_pass) {

                

               // echo "success";

                 $query= "update users set password= ' ".sha1($new_pass)." ' WHERE username = '".$_SESSION['username']."'";
              $check = mysqli_query($db, $query);
                 echo "password changed";
               
              




              }else {
                
                echo "New password do not match";

              }

            }else{

              echo "New Password must be longer than 6 characters";
            }
           }   else{

               echo "Your current password is different from the old one";
           }
          
       }

     echo "</center></form>";


   }
	
}else{

  echo "You must be logged  in.";
}

?>