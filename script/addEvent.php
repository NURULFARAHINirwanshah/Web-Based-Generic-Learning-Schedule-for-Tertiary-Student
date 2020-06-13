<?php

session_start();

include 'connect.php';

//if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['startDate']) && isset($_POST['endDate'])&& isset($_POST['color'])&& isset($_POST['DOW'])){
	
//	$_SESSION["studentID"] = $row["SID"]; 
	$SID = $_SESSION["studentID"];
	
	$AID = $_POST['AID'];
	$eventTitle = $_POST['eventTitle'];
	$eventVenue = $_POST['eventVenue'];
	$eventDesc = $_POST['eventDesc'];
	$eventColor = $_POST['eventColor'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$DOW = $_POST['DOW'];

	$sql2 = "SELECT * FROM events WHERE SID = '$SID' AND startTime = '$startTime'";
	$r2 = mysql_query($sql2);
	//$rownum2 = mysql_num_rows($r2);

//	if ($rownum2 != 0)
//	{
	/*	$msg2 = "Event Already Exist!";
		echo '<script type="text/javascript">alert("'.$msg2.'");</script>';
		echo "<meta http-equiv=\"refresh\" content=\"0; url=Calendar.php\">"; */
	//}
	//else {
	
if ($AID == '1') {
	
	$day_num = Date('w', strtotime($startDate));
	
	$starttime = $startTime;
    $stoptime = $endTime;
    $diff = (strtotime($stoptime) - strtotime($starttime));
    $total = $diff/60;
	$totalTime = sprintf("%02d:%02d", floor($total/60), $total%60);
	
	$sql = "INSERT INTO events (SID, AID, eventTitle, eventVenue, eventDesc, eventColor, startTime, endTime, startDate, endDate, DOW, totalTime) VALUES ('$SID', '$AID', '$eventTitle', '$eventVenue', '$eventDesc', '#1b9652', '$startTime', '$endTime', '$startDate', '$endDate', '$day_num', '$totalTime')";
	$r = mysql_query($sql);
	
	//echo $r;
}

else if ($AID == '2'){

	$day_num = Date('w', strtotime($startDate));
	
	$starttime = $startTime;
    $stoptime = $endTime;
    $diff = (strtotime($stoptime) - strtotime($starttime));
    $total = $diff/60;
	$totalTime = sprintf("%02d:%02d", floor($total/60), $total%60);
	
	$sql = "INSERT INTO events (SID, AID, eventTitle, eventVenue, eventDesc, eventColor, startTime, endTime, startDate, endDate, DOW, totalTime) VALUES ('$SID', '$AID', '$eventTitle', '$eventVenue', '$eventDesc', '#c9a72c', '$startTime', '$endTime', '$startDate', '$endDate', '$day_num', '$totalTime')";
	$r = mysql_query($sql);
	
	//echo $r;
}

else {
	
	$starttime = $startTime;
    $stoptime = $endTime;
    $diff = (strtotime($stoptime) - strtotime($starttime));
    $total = $diff/60;
	$totalTime = sprintf("%02d:%02d", floor($total/60), $total%60);
	
	$sql = "INSERT INTO events (SID, AID, eventTitle, eventVenue, eventDesc, eventColor, startTime, endTime, startDate, endDate, DOW, totalTime) VALUES ('$SID', '3', '$eventTitle', '$eventVenue', '$eventDesc', '#1b7196', '$startTime', '$endTime', '$startDate', '$endDate', '$DOW', '$totalTime')";
	$r = mysql_query($sql);
	
	//echo $r;
	
}
	//}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>
