<?php

	session_start();
	include "connect.php";
	$SID = $_SESSION["studentID"];

	$sql5 = "SELECT * FROM student WHERE SID = '".$_SESSION["studentID"]."'";
	$r5 = mysql_query($sql5);
	$row = mysql_fetch_assoc($r5);
	
	$sql = "SELECT * FROM events WHERE SID = '$SID'";
	$r = mysql_query($sql);
	$events = array();
	while ($event = mysql_fetch_array($r))
	$events[] = $event; 

	//Calculate total learning time
	$sql1 = "SELECT SUM(totalTime) as totalStudy FROM events WHERE SID = '$SID' AND AID = '1'";
	$excutesql1 = mysql_query($sql1) or die (mysql_error());
	while($resultSql1 =  mysql_fetch_assoc($excutesql1)){
	$totalStudy = $resultSql1['totalStudy'];
	}
	
	//Calculate total playing time
	$sql2 = "SELECT SUM(totalTime) as totalPlay FROM events WHERE SID = '$SID' AND AID = '2'";
	$excutesql2 = mysql_query($sql2) or die (mysql_error());
	while($resultSql2 =  mysql_fetch_assoc($excutesql2)){
	$totalPlay = $resultSql2['totalPlay'];
	}
	
	//Calculate percentage of total learning time and total playing time
	if ($totalStudy > 0 || $totalPlay > 0){ 
	$totalHour = $totalStudy+$totalPlay; 
	$percentageStudy = $totalStudy/$totalHour*100;
	$percentagePlay = $totalPlay/$totalHour*100;
	}
	else {
		$percentageStudy = 0;
		$percentagePlay = 0;
	}
	
	//Calculation for Analysis
	$curryr = date("Y");
	
	$sql8 = "SELECT EXTRACT(month FROM startDate) AS 'month', HOUR(SUM(endTime-startTime)) AS 'playtime' FROM events WHERE SID = ".$SID." AND YEAR(startDate) = ".$curryr." AND AID = '1' GROUP BY month ASC";
	$res8 = mysql_query($sql8) or die (mysql_error());
	
	$sql9 = "SELECT EXTRACT(month FROM startDate) AS 'month', HOUR(SUM(endTime-startTime)) AS 'studtime' FROM events WHERE SID = ".$SID." AND YEAR(startDate) = ".$curryr." AND AID = '2' GROUP BY month ASC";
	$res9 = mysql_query($sql9) or die (mysql_error());
	
	$lstM = 0;
	//playtime
	$playtime = "";
	$month = "";
	$j=1;
	while ($row8 = mysql_fetch_assoc($res8))
	{
		for ($i=$j; $i<=11; $i++)
		{
			if ($row8["month"] == $j)
			{
				$mth = $row8["month"];
				$st = $row8["playtime"];
				$playtime .= '{ label: "'.$mth.'", y: '.$st.' },';
				$j++;
				break;
			}
			else 
			{
				$mth = $j;
				$st = 0;
				$playtime .= '{ label: "'.$mth.'", y: '.$st.' },';
				$j++;
			}
		}
		
		if ($row8["month"] == 12)
			{
				$lstM = $row8["month"];
				$lstV = $row8["playtime"];
			}
	}
	
	for ($i=$j; $i<=12; $i++)
	{
		if ($lstM == $j)
		{
			$mth = $lstM;
			$st = $lstV;
		}
		else 
		{
			$mth = $j;
			$st = 0;
		}
		if ($i != 12)
			$playtime .= '{ label: "'.$mth.'", y: '.$st.' },';
		else
			$playtime .= '{ label: "'.$mth.'", y: '.$st.' }';
		$j++;
	}
	
	//studytime
	$studtime = "";
	$month = "";
	$j=1;
	while ($row9 = mysql_fetch_assoc($res9))
	{
		for ($i=$j; $i<=11; $i++)
		{
			if ($row9["month"] == $j)
			{
				$mth = $row9["month"];
				$st = $row9["studtime"];
				$studtime .= '{ label: "'.$mth.'", y: '.$st.' },';
				$j++;
				break;
			}
			else 
			{
				$mth = $j;
				$st = 0;
				$studtime .= '{ label: "'.$mth.'", y: '.$st.' },';
				$j++;
			}
		}
		
		if ($row9["month"] == 12)
			{
				$lstM = $row9["month"];
				$lstV = $row9["studtime"];
			}
	}
	
	for ($i=$j; $i<=12; $i++)
	{
		if ($lstM == $j)
		{
			$mth = $lstM;
			$st = $lstV;
		}
		else 
		{
			$mth = $j;
			$st = 0;
		}
		if ($i != 12)
			$studtime .= '{ label: "'.$mth.'", y: '.$st.' },';
		else
			$studtime .= '{ label: "'.$mth.'", y: '.$st.' }';
		$j++;
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="icon" href="../img/logo.png" >
	<title>Web-Based Generic Learning Schedule for Tertiary Student</title>
	
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <link href='./lib/fullcalendar.min.css' rel='stylesheet'/>
  <link href='./lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <script src='./lib/jquery.min.js'></script>
  <script src='./lib/moment.min.js'></script>
  <script src='./lib/jquery-ui.custom.min.js'></script>
  <script src='./lib/fullcalendar.min.js'></script>
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <!--tambah-->
   <title>Schedule</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
  
   <!-- Custom CSS -->
    <style>
	* {
    box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
    height: 100%;
}
.right {
  width: 30%;
}
.left {
  width: 70%;
   border-right: solid;
   border-color: #00394f; 
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.playColor{
	color: red;
}
.learningColor{
	color: blue;
}

/* end of column css */
    </style>
  
  
  <script>
  
    $(document).ready(function () {
		
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");
      }
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
	  
      var calendar = $('#calendar').fullCalendar({
		  
		 aspectRatio: 2,
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },

        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
      
		  //script for range dow
			var theDate = event.start
			var endDate = event.dowend;
			var startDate = event.dowstart;
        
			if (theDate >= endDate) {
                return false;
			}

			if (theDate <= startDate) {
				return false;
			}
		  
		  element.bind('dblclick', function() {
					$('#ModalEdit #EID').val(event.id);
					$('#ModalEdit #eventTitle').val(event.title);
					$('#ModalEdit #eventVenue').val(event.venue);
					$('#ModalEdit #eventDesc').val(event.description);
					$('#ModalEdit #startDate').val(event.startdate);
					$('#ModalEdit #endDate').val(event.enddate);
					$('#ModalEdit #startTime').val(event.starttime);
					$('#ModalEdit #endTime').val(event.endtime);
					$('#ModalEdit #DOW').val(event.dow);
					$('#ModalEdit').modal('show');  
					
				}); 
		  
        },
		
		//untuk selectable
        selectable: true,
        selectHelper: false,
        select: function (start, end, allDay) {

				//$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				//$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #startTime').val(moment(start).format('HH:mm:ss'));
				$('#ModalAdd #endTime').val(moment(end).format('HH:mm:ss'));
				$('#ModalAdd #startDate').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #endDate').val(moment(end).format('YYYY-MM-DD'));
				$('#ModalAdd').modal('show');
        },

        editable: true,
        eventDrop: function (event, delta, revertFunc) {
		  
		  edit(event);
		  
        },

        eventResize: function (event,dayDelta,minuteDelta,revertFunc) {

		  edit(event);
		  
        },
		
		events: [
			<?php foreach($events as $event): ?>
				{
					id: '<?php echo $event['EID']; ?>',
					title: '<?php echo $event['eventTitle']; ?>',
					venue: '<?php echo $event['eventVenue']; ?>',
					description: '<?php echo $event['eventDesc']; ?>',
					startdate: '<?php echo $event['startDate']; ?>',
					enddate: '<?php echo $event['endDate']; ?>',
					starttime: '<?php echo $event['startTime']; ?>',
					endtime: '<?php echo $event['endTime']; ?>',
					start: '<?php echo $event['startTime']; ?>',
					end: '<?php echo $event['endTime']; ?>',
					color: '<?php echo $event['eventColor']; ?>',
					dow: ['<?php echo $event['DOW']; ?>'],
					dowstart: new Date('<?php echo $event['startDate']; ?>'),
					dowend: new Date('<?php echo $event['endDate']; ?>')

				},
			<?php endforeach; ?>
			]
      });

    });

	function addClass () {

				/*$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #startTime').val(moment(startTime).format('HH:mm:ss'));
				$('#ModalAdd #endTime').val(moment(endTime).format('HH:mm:ss')); 
				$('#ModalAdd #startDate').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #endDate').val(moment(start).format('YYYY-MM-DD'));*/
				$('#ModalAddClass').modal('show');
        }
		
	function printDiv(printableArea) {
    var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
	
	
	window.onload = function () {
	var chart = new CanvasJS.Chart("BarGraph", {
	animationEnabled: true,
		title:{
			text: "Total Time Spent on Studying and Playing's Activities"
		},	
		axisY: {
			title: "Hours",
			titleFontColor: "#4F81BC",
			lineColor: "#4F81BC",
			labelFontColor: "#4F81BC",
			tickColor: "#4F81BC"
		},
		axisX: {
			title: "Month",
			titleFontColor: "#4F81BC",
			lineColor: "#4F81BC",
			labelFontColor: "#4F81BC",
			tickColor: "#4F81BC"
		},
		toolTip: {
			shared: true
		},
		legend: {
			cursor:"pointer",
			itemclick: toggleDataSeries
		},
		data: [
		{
			type: "column",	
			name: "Play",
			legendText: "Play",
			showInLegend: true,
			color: "#1b9652",
			dataPoints:[
				<?=$playtime?>
			]
		},
		{
			type: "column",
			name: "Study",
			legendText: "Study",
			showInLegend: true, 
			color: "#c9a72c",
			dataPoints:[
				<?=$studtime?>
			]
		}]
	});
	chart.render();

		function toggleDataSeries(e) {
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else {
				e.dataSeries.visible = true;
			}
			chart.render();
		}
	}
	
  </script>
  <style>

    body {
      margin-top: 40px;
      //text-align: center;
      font-size: 14px;
      font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

    }

    #calendar {
     width: 930px;
     //margin: 0 auto;
	 //padding-right: 80px;
	 display: table-cell;
    }
	h5 {
    background-color: #00394f;
	padding-left: 50px;
	margin-top: 0px;
	border:5px solid #00394f;
	font-size: 20px;
	color: #FFFFFF;
}
.white{
	color: #FFFFFF;
}

  </style>
</head>
<body>

    <!-- Navigation -->
	<nav class="navbar navbar-fixed-top">
	 <h5><img src="../img/logo.png" width="60" height="60">&nbsp; &nbsp; &nbsp; Web-Based Generic Learning Schedule for Tertiary Student <b style="padding-left:30%; font-size:15px">Hello, <i><?php echo $row["Username"]; ?></i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Profile.php"><span class="glyphicon glyphicon-user white" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="SignOut-func.php"><span class="glyphicon glyphicon-off white"></a></span>
	</h5>
    </nav> 
	
	
	<div class="row">
	
  <div class="column left">
  <div id="printableArea">
  
	<br><br>
	<p align="right"><button onclick="addClass()" value="submit" class="btn btn-primary">Add Class</button> &nbsp; &nbsp; &nbsp; 
		<button class="btn btn-primary" onclick="printDiv('printableArea')" value="submit"><span class="glyphicon glyphicon-print"></span></button></p>
	


    <!-- Page Content -->
    <div class="container">
	
     <center>   <div class="row">
            <div class="col-lg-12 text-center">
             <!--   <h1>FullCalendar BS3 PHP MySQL</h1>
                <p class="lead">Complete with pre-defined file paths that you won't have to change!</p> -->
                <div id="calendar">
                </div> 
            </div>
        </div> </center>
        <!-- /.row -->
		
		<!-------------------------------------------- Modal Add Class -------------------------------------------------->
		<div class="modal fade" id="ModalAddClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">  
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Class Lecture/Lab</h4>
			  </div>
			  
			  <div class="modal-body">
			 				
							
				<br><br>
				  <div class="form-group">
					<label for="eventTitle" class="col-sm-2 control-label">Class Title</label>
					<div class="col-sm-10">
					  <input type="text" name="eventTitle" class="form-control" id="eventTitle" placeholder="Title">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="eventVenue" class="col-sm-2 control-label">Venue</label>
					<div class="col-sm-10">
					  <input type="text" name="eventVenue" class="form-control" id="eventVenue" placeholder="Venue">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="eventDesc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" name="eventDesc" class="form-control" id="eventDesc" placeholder="Description">
					</div>
				  </div>
				  		  
				   <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="date" name="startDate" class="form-control" id="startDate" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endDate" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="date" name="endDate" class="form-control" id="endDate" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start Time</label>
					<div class="col-sm-10">
					  <input type="time" name="startTime" class="form-control" id="startTime" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End Time</label>
					<div class="col-sm-10">
					  <input type="time" name="endTime" class="form-control" id="endTime" >
					</div>
				  </div>
				  
				       <div class="form-group">
					<label for="DOW" class="col-sm-2 control-label">Day</label>
					<div class="col-sm-10">
					  <select name="DOW" class="form-control" id="DOW">
							<option value=""></option>
						  <option value="0">Sunday</option>
						  <option value="1">Monday</option>
						  <option value="2">Tuesday</option>						  
						  <option value="3">Wednesday</option>
						  <option value="4">Thursday</option>
						  <option value="5">Friday</option>
						  <option value="6">Saturday</option>
						</select>
					</div>
				  </div>		  
			
			  </div>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			  
			</form>
			</div>
		  </div>
		</div>
		
<!-------------------------------------------------------- Modal Add Activity ----------------------------------------------------------->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">  
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Activity</h4>
			  </div>
			  
			  <div class="modal-body">
			 				
					<br><br>
					 <div class="form-group">
					<label for="AID" class="col-sm-2 control-label">Activity</label>
					<div class="col-sm-10">
					  <select name="AID" class="form-control" id="AID">
						  <option value=""></option>
						  <option value="1">Play</option>
						  <option  value="2">Study</option>
						</select>
					</div>
				  </div>
			  
				  <div class="form-group">
					<label for="eventTitle" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="eventTitle" class="form-control" id="eventTitle" placeholder="Title">
					</div>
				  </div>
				  
				   <div class="form-group">
					<label for="eventVenue" class="col-sm-2 control-label">Venue</label>
					<div class="col-sm-10">
					  <input type="text" name="eventVenue" class="form-control" id="eventVenue" placeholder="Venue">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="eventDesc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" name="eventDesc" class="form-control" id="eventDesc" placeholder="Description">
					</div>
				  </div>
					
					  <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="date" name="startDate" class="form-control" id="startDate" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endDate" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="date" name="endDate" class="form-control" id="endDate">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start Time</label>
					<div class="col-sm-10">
					  <input type="time" name="startTime" class="form-control" id="startTime" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End Time</label>
					<div class="col-sm-10">
					  <input type="time" name="endTime" class="form-control" id="endTime" >
					</div>
				  </div>
				 
			  </div>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			  
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-------------------------------------------------------- Modal Edit -------------------------------------------------------------------->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  
			  <div class="modal-body">
				   <div class="form-group">
					<label for="eventTitle" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="eventTitle" class="form-control" id="eventTitle" >
					</div>
				  </div>
				  
				   <div class="form-group">
					<label for="eventVenue" class="col-sm-2 control-label">Venue</label>
					<div class="col-sm-10">
					  <input type="text" name="eventVenue" class="form-control" id="eventVenue" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="eventDesc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" name="eventDesc" class="form-control" id="eventDesc" >
					</div>
				  </div>
				  		  
				   <div class="form-group">
					<label for="startDate" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="date" name="startDate" class="form-control" id="startDate" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endDate" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="date" name="endDate" class="form-control" id="endDate" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="startTime" class="col-sm-2 control-label">Start Time</label>
					<div class="col-sm-10">
					  <input type="time" name="startTime" class="form-control" id="startTime" >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="endTime" class="col-sm-2 control-label">End Time</label>
					<div class="col-sm-10">
					  <input type="time" name="endTime" class="form-control" id="endTime" >
					</div>
				  </div>
				  
				       <div class="form-group">
					<label for="DOW" class="col-sm-2 control-label">Day</label>
					<div class="col-sm-10">
					  <select name="DOW" class="form-control" id="DOW" >
							<option value=""></option>
						  <option value="0">Sunday</option>
						  <option value="1">Monday</option>
						  <option value="2">Tuesday</option>						  
						  <option value="3">Wednesday</option>
						  <option value="4">Thursday</option>
						  <option value="5">Friday</option>
						  <option value="6">Saturday</option>
						</select>
					</div>
				  </div>		  
				  
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="EID" class="form-control" id="EID">
			  </div>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			  
			</form>
			</div>
		  </div>
		</div>
</div>
    </div>
	
    <!-- /.container -->

	</div>
  <div class="column right">
  <br><br>
   <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Analysis</a></li>
  <!--  <li><a data-toggle="pill" href="#menu2">Class</a></li>
    <li><a data-toggle="pill" href="#menu3">Activity</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	
	<br>
	<center><p style="font-size:24px; font-family:Lucida Handwriting; color:grey"><b> Analysis of <i><?php echo $curryr ?> </i></b></p></center>
	
	<br>
	<!------------------------------ Bar Graph ---------------------------------->
       <div id="BarGraph" style="height: 300px; width: 100%; margin-top:30px;"></div>   
    </div>
    
<!--	
	<div id="menu2" class="tab-pane fade">
      <h3>Class Details</h3>
 
	</div>
	
    <div id="menu3" class="tab-pane fade">
      <h3>Activity Details</h3>
	  
	</div> -->
  </div>

  </div>
  
</div>
	 <!-- Pie Chart js -->
	<script src="js/canvasjs.min.js"></script>
	
	 <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
</body>
</html>
