<html>

<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />

<style>
table, th, td {
  border: 2px solid white;
  border-collapse: collapse;
  padding: 15px;
}
th, td {
  background-color: #96D4D4;
}

.css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}

</style>
</head>

<body style="background-color: #eacdbc">

<?php

// database connection
$mysqli = new mysqli("localhost","root","","booking");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// echo "success"

$mode = $_POST['mode'];
if ($mode == "Flights") {
	$class = $_POST['class'];
	$airline = $_POST['airline'];
}

else if ($mode == "Trains") {
	$class = $_POST['class'];
	$airline = '';
}

else {
	$class = '';
	$airline = '';
}

$from = $_POST['from'];
$to = $_POST['to'];
$price = $_POST['price'];

$Sdate = $_POST['date'];
$Stime = $_POST['time'];
$Stimestamp = $Sdate;
$Stimestamp .= " ";
$Stimestamp .= $Stime;
$Stimestamp .= ":00";
// echo $Stimestamp;

$Edate = $_POST['edate'];
$Etime = $_POST['etime'];
$Etimestamp = $Edate;
$Etimestamp .= " ";
$Etimestamp .= $Etime;
$Etimestamp .= ":00";
// echo $Etimestamp;
?>

	<nav id="navbar" class="navbar order-last order-lg-0">
		<a id="logo" style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;" class="nav-link scrollto active" href="../index.php">BookMyTrip</a>
	    <ul style="float: right;">
          <li><a id="logo" class="nav-link scrollto active" href="index.php">Add new category</a></li>
          <li><a id="logo" class="nav-link scrollto" href="booking.php">View Bookings</a></li>
		  <li><a id="logo" class="nav-link scrollto" href="category.php">View Categories</a></li>
        </ul>
    </nav>

<?php
	$sql = "insert into category (name, type, airline, source, destination, price, startTime, endTime)
	values ('$mode', '$class', '$airline', '$from', '$to', '$price', '$Stimestamp', '$Etimestamp')";

	if ($mysqli->query($sql) === FALSE) {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
	}


	$last_id = $mysqli->insert_id;
?>

<br><br><br>
<center>
<h1 style="color: grey">New Category added successfully under catgory number <?php echo $last_id ?> !!<br></h1>
</center>

</body>
</html> 
