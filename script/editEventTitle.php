<?php
session_start();
require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['EID'])){
	
	
	$EID = $_POST['EID'];
	
	$sql = "DELETE FROM events WHERE EID = $EID";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}
	
}elseif (isset($_POST['EID']) && isset($_POST['eventTitle']) && isset($_POST['eventVenue']) && isset($_POST['eventDesc']) && isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['DOW'])){
	
	$EID = $_POST['EID'];
	$eventTitle = $_POST['eventTitle'];
	$eventVenue = $_POST['eventVenue'];
	$eventDesc = $_POST['eventDesc'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$DOW = $_POST['DOW'];
	
	$sql = "UPDATE events SET  eventTitle = '$eventTitle', eventVenue = '$eventVenue', eventDesc = '$eventDesc', startTime = '$startTime', endTime = '$endTime', startDate = '$startDate', endDate = '$endDate', DOW = '$DOW' WHERE EID = $EID ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error');
	}

}
header('Location: Calendar.php');

	
?>
