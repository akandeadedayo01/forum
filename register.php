<!DOCTYPE html>
<html>
<head>
	<title>Forum's Register</title>
</head>
<body>

    <form action="register.php "  method="POST">
    username: <input type="text" name="username">
	</br></br>
    Password: <input type="password" name="password">
    </br></br>
    Verify password: <input type="password" name="repassword">
    </br></br>
    Email: <input type="text" name="email">
    </br></br>
    <input type="submit" name="submit" value="Register"> or
    <a href="login.php">login</a>


    </form>


</body>
</html>

<?php

require_once "connect.php";


$username = @$_POST['username'];
$password = @$_POST['password'];
$repass = @$_POST['repassword'];
$email = @$_POST['email'];
$date = date("Y-m-d");
$pass= sha1($password);


if (isset($_POST['submit'])) {

            if ($username && $password && $repass && $email) {    // if the fields are not empty continue working ,else means fill in the fields
              if(strlen($username) >= 5 && strlen($username) < 25 && strlen($password) > 6)	 {
                   if($password == $repass){
                   	$query = "INSERT INTO users (id, username, email, password, date) 
			  VALUES('', '$username', '$email', '$pass', '$date')";

				if (mysqli_query($db, $query)) {

				echo "you have been registered as $username. Click <a href='login.php'> here</a> to login";

				}	else{
			
				echo "failed";

				}
                   }else{

                   	echo "password do not match";
                   }

              	}  else{

              	if(strlen($username) < 5 || strlen($username) > 25) {

              		echo "</br>username must be between 5 and 25 characters";
              	}

              	if(strlen($password) < 6) {
              		echo "</br>Password must be longer than 6 characters";
              	}
            	  }                                           
            	
            }else{
            	echo "please fill in the fields";
            }

	
}



?>