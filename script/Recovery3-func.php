<?php

session_start();
include "connect.php";

$Password = md5($_POST["Password"]);
$CPassword = md5($_POST["CPassword"]);

$sql2 = "UPDATE student SET Password = '$Password' WHERE SID='".$_SESSION["studentID"]."'";
$r = mysql_query($sql2);

if ($r)
{
	$msg2 = "New password updated! Please sign in again.";
	echo '<script type="text/javascript">alert("'.$msg2.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=SignIn.php\">";
}
else
{
	$msg = " Please fill all the requirements.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=Recovery3.php\">";
} 

?>