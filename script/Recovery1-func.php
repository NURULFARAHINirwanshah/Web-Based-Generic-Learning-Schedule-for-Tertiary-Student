<?php

session_start();
include "connect.php";

$Username = $_POST["Username"];

$sql = "SELECT SID FROM student WHERE Username = '$Username'";
$r = mysql_query($sql);
$rownum = mysql_num_rows($r);

if ($rownum == 1)
{
	$row = mysql_fetch_assoc($r);
	$_SESSION["studentID"] = $row["SID"];
	header("Location:Recovery2.php"); 
}
else
{
	$msg = " Please enter valid username.";
	echo '<script type="text/javascript">alert("'.$msg.'");</script>';
	echo "<meta http-equiv=\"refresh\" content=\"0; url=Recovery1.php\">";
}

?>