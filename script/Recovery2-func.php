<?php
session_start();
include "connect.php";

$SecretAns = md5($_POST["SecretAns"]);
$SID = $_SESSION["studentID"];

$sql2 = "SELECT * FROM student WHERE SID = '$SID' AND SecretAns = '$SecretAns'";
$r = mysql_query($sql2);
$rownum = mysql_num_rows($r);

//if answer true
if ($rownum == 1)
{
	header("Location:Recovery3.php"); 
}
else
{
	$msg = " Wrong answer.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=Recovery2.php\">";
}


?>