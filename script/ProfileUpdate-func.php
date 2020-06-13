<?php

session_start();
include "connect.php";

$Name = $_POST['Name'];
$Username = $_POST['Username'];
$Email = $_POST['Email'];
$SecretQtn = $_POST['SecretQtn'];
$SecretAns = md5($_POST['SecretAns']);

$sql2 = "UPDATE student SET Name = '$Name', Username = '$Username', Email = '$Email', SecretQtn = '$SecretQtn', SecretAns= '$SecretAns' WHERE SID='".$_SESSION["studentID"]."'";
$r = mysql_query($sql2);

if ($r)
{
	$msg2 = "New Profile updated!";
	echo '<script type="text/javascript">alert("'.$msg2.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=Profile.php\">";
}
else
{
	$msg = " Please fill all the requirements.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=ProfileEdit.php\">";
} 

?>