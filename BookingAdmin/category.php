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


#logo {
    text-decoration: none;
}

</style>

</head>

<body style="background-color: #eacdbc">
    
    <nav id="navbar" class="navbar order-last order-lg-0">
        <a id="logo" style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;" class="nav-link scrollto active" href="../index.php">BookMyTrip</a>
	    <ul style="float: right;">
          <li><a id="logo" class="nav-link scrollto" href="index.php">Add new category</a></li>
          <li><a id="logo" class="nav-link scrollto" href="booking.php">View Bookings</a></li>
		  <li><a id="logo" class="nav-link scrollto active" href="category.php">View Categories</a></li>
        </ul>
    </nav>
    <br><br>
<?php

// database connection
$mysqli = new mysqli("localhost","root","","booking");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// echo "success"

date_default_timezone_set('Asia/Kolkata');
$date = date('d-M-Y  H:i');
// echo $date;

$cur_date = strtotime($date);

?>

<center>
<h1 style="color: grey">Category List<br></h1>
</center>

<?php
$select_sql = "select * from category";

// echo $select_sql;

$result = $mysqli->query($select_sql);
if ($result->num_rows > 0) {
		?>
        <center>
		<table class="css-serial">
			<thead>
				<tr>
					<th><center>S.No</center></th>
					<th><center>Mode</center></th>
                    <th><center>Class</center></th>
                    <th><center>From</center></th>
                    <th><center>To</center></th>
					<th><center>Start Date and Time</center></th>
					<th><center>End Date and Time</center></th>
					<th><center>Price</center></th>
                    <th><center>Status</center></th>
					<th></th>
				</tr>
			</thead>

		<?php

		while($row = $result->fetch_assoc()) {
			?>
			<tbody>
					<tr>
						<td></td>
                        <?php
                        if ($row["name"] == 'Flights') {
                        ?>
						    <td><?php echo $row["name"]?> - <?php echo $row["airline"]?></td>
                        <?php
                        }

                        else {
                        ?>
                            <td><?php echo $row["name"]?></td>
                        <?php
                        }
                        ?>
						<td><?php echo $row["type"] ?></td>
                        <td><?php echo $row["source"] ?></td>
                        <td><?php echo $row["destination"] ?></td>
                        <td><?php echo date('d-M-Y  H:i', strtotime($row['startTime'])) ?></td>
						<td><?php echo date('d-M-Y  H:i', strtotime($row['endTime'])) ?></td>
						<td><?php echo $row["price"] ?></td>

                        <?php
                        if ($row['isCancelled'] == 0) {
                            if (strtotime($row['startTime'])>$cur_date) {
                                ?>
                                <td>Pending</td>
                                <td>
                                <a href="../BookingAdmin/cancel.php?id_category=<?php echo $row["id"]; ?>&bookingId=0&value=1"><button>Cancel Mode</button></a>
                                </td>
                                <?php
                            }
                            else if (strtotime($row['startTime']) <= $cur_date) {
                                ?>
                                <td>Went</td>
                                <td></td>
                                <?php
                            }
                        }

                        else {
                            ?>
                            <td>Cancelled</td>
                            <td></td>
                            <?php
                        }
                        ?>
					</tr>
			</tbody>
			   
			 <?php
			}
			 ?>
		</table>
        </center>
	<?php
}

	

else {
	?>
	
	<h1 style="color: grey; float: center;">No current bookings found..!!</h1>
	
	<?php
}
?>

</body>
</html> 
