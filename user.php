<html>

<head>
	<link href="css/style.css" rel="stylesheet">
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

	<nav id="navbar" class="navbar order-last order-lg-0">
 		<h3 style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;">BookMyTrip</h3>
        <ul style="float: right;">
          <li><a class="nav-link scrollto active" href="index.php">Book a Ticket</a></li>
          <li><a class="nav-link scrollto" href="status.php">Booking Status</a></li>
		  <!-- <li><a class="nav-link scrollto" href="../Booking/BookingAdmin/login.php">Admin Page</a></li> -->
        </ul>
    </nav>

	<br><br><br>

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
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];

?>

<h1><mark><?php echo $mode ?> available from <?php echo $from ?> to <?php echo $to ?> are -- <br></mark></h1>
<h2 style="color: grey;">Date - <?php echo date('d M, Y', strtotime($date))?></h2><br>

<?php

$select_sql = "select * from category where name='$mode' and source='$from' 
               and destination='$to' and DATE_FORMAT(startTime, '%Y-%m-%d')='$date'";

// echo $select_sql;

$result = $mysqli->query($select_sql);
if ($result->num_rows > 0) {
	if ($mode == "Flights") {
		?>
		<table class="css-serial">
			<thead>
				<tr>
					<th><center>S.No</center></th>
					<th><center>Airline</center></th>
					<th><center>Class</center></th>
					<th><center>Price</center></th>
					<th><center>Start Time</center></th>
					<th><center>End Time</center></th>
					<th></th>
				</tr>
			</thead>

		<?php

		while($row = $result->fetch_assoc()) {
			?>
			<tbody>
					<tr>
						<td></td>
						<td><?php echo $row["airline"] ?></td>
						<td><?php echo $row["type"] ?></td>
						<td>INR <?php echo $row["price"] ?></td>
						<td><?php echo date('H:i', strtotime($row['startTime'])) ?></td>
						<td><?php echo date('H:i', strtotime($row['endTime'])) ?></td>
						<!-- <td><form action="booking.php" method="post">
							<button name="id_category" value=>Book Now !</button>
						</form></td> -->
						<td><a href="../Booking/booking.php?id_category=<?php echo $row["id"]; ?>&price=<?php echo $row["price"] ?>"><button>Book Now !</button></a></td>
					</tr>
			</tbody>
			   
			 <?php
			 }
			 ?>
		</table>
	<?php
	}

	else {
 	?>
 	<table class="css-serial">
		<thead>
			<tr>
				<th><center>S.No</center></th>
				<th><center>Class</center></th>
				<th><center>Price</center></th>
				<th><center>Start Time</center></th>
				<th><center>End Time</center></th>
				<th></th>
			</tr>
		</thead>

 	<?php
 	while($row = $result->fetch_assoc()) {
 	?>
	 	<tbody>
			<tr>
				<td></td>
				<td><?php echo $row["type"] ?></td>
				<td>INR <?php echo $row["price"] ?></td>
				<td><?php echo date('H:i', strtotime($row['startTime'])) ?></td>
				<td><?php echo date('H:i', strtotime($row['endTime'])) ?></td>
				<td><a href="../Booking/booking.php?id_category=<?php echo $row["id"]; ?>&price=<?php echo $row["price"] ?>"><button>Book Now !</button></a></td>
			</tr>
	 	</tbody>
	    
  	<?php
  	}
  	?>
  	</table>
	  
<?php
	}
}

else {
	?>
	
	<h1 style="color: grey; float: center;">Sorry, no <?php echo $mode ?> found</h1>
	
	<?php
}
?>

</body>
</html> 
