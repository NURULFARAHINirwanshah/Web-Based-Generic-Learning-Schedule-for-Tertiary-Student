<?php

session_start();

include 'connect.php';
  
$_SESSION["studentID"] = $row["SID"]; 
$SID = $_SESSION["studentID"];

$Name = $_POST['Name'];
$Username = $_POST['Username'];
$Email = $_POST['Email'];
$SecretQtn = $_POST['SecretQtn'];
$SecretAns = md5($_POST['SecretAns']);
$Password = md5($_POST['Password']);

if($Name==''||$Username==''||$Email==''||$SecretQtn==''||$SecretAns==''||$Password=='')
{
	$msg = "Please fill all the requiremet field.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=SignUp.php\">";
}


else {
	
	$sql = "INSERT INTO student (`Name`, `Username`, `Email`, `SecretQtn`, `SecretAns`, `Password`) VALUES ('$Name','$Username','$Email','$SecretQtn','$SecretAns','$Password')";
	$r = mysql_query($sql);
	
	$msg2 = "Registration Successful!";
	echo '<script type="text/javascript">alert("'.$msg2.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=SignIn.php\">";
}	
	?>