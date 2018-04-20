<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


	<form action="login.php"  method="POST">
		
		username:<input type="text" name="username"> </br></br>
		password:<input type="password" name="password"> </br></br>
		<input type="submit" value="login" name="submit">  or <a href="register.php">Register</a>


	</form>






</body>
</html>


<?php
      
      session_start();

      require_once "connect.php";

	$username = @$_POST['username'];
	$password = @$_POST['password'];

	if (isset($_POST['submit'])) {

		if ($username && $password) {
			 
			 $query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);

			 if(mysqli_num_rows($results) != 0){

			 	 while ($row = mysqli_fetch_assoc($results)) {
			 	 	$db_username = $row['username'];
			 	 	$db_password = $row['password'];

			 	 }

			 	   if($username == $db_username && sha1($password) == $db_password){
			 	   	       @$_SESSION["username"] = $username;
			 	   	       header("Location: index.php");

			 	   }else{
			 	   	  echo "Your password is wrong";
			 	   }

			}else{
				echo "couldnt find username";
			}


		}else{
			echo " Please fill in the fiedls";
		}
	

	}




?>