
<?php

if (@$_SESSION['username']) {
     

?>


 <center><a href="index.php">Homepage</a>  | <a href="account.php"> My account</a> | <a href="members.php"> Members </a> |

 	<?php 
     
    $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";  // we are trying to create profile here 
			 $check = mysqli_query($db, $query);

			 $rows = mysqli_num_rows($check); 

			 while($row = mysqli_fetch_assoc($check)){
			 	$id = $row['id'];
			 }

			 echo "Logged in as <a href='profile.php?id=$id'>";
			 echo @$_SESSION['username']."</a> | ";

			 ?>

			 <a href="index.php?action=logout"> logout</a> </center>

 <?php

}else{
	header("Location: login.php");
}


 ?>