<?php

session_start();
include "connect.php";

$Username = $_POST["Username"];
$Password = md5($_POST["Password"]);

$sql = "SELECT SID FROM student WHERE Username = '$Username' AND Password = '$Password'";
$r = mysql_query($sql);
$rownum = mysql_num_rows($r);

if ($rownum == 1)
{
	$row = mysql_fetch_assoc($r);
	$_SESSION["uname"] = $Username;
	$_SESSION["studentID"] = $row["SID"];
	header("Location:Calendar.php"); 
}
else
{
	$msg = " Please enter valid username and password.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=SignIn.php\">";
}

?>