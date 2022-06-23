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
          <li><a id="logo" class="nav-link scrollto active" href="booking.php">View Bookings</a></li>
		      <li><a id="logo" class="nav-link scrollto" href="category.php">View Categories</a></li>
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

$Booking_ID = $_GET['bookingId'];
$Category_ID = $_GET['id_category'];
$val = $_GET['value'];

$query = "select name from category where id=$Category_ID ";
// echo $price;
$resultQuery = $mysqli->query($query);
$modeName = mysqli_fetch_array($resultQuery);

if ($val == 0) {
    $update = "UPDATE booking SET bookingStatus='Cancel' WHERE bid = $Booking_ID";

    if ($mysqli->query($update) === FALSE) {
        echo "Error updating record: " . $mysqli->error;
    }
    ?>
    <center><h1 style="color: grey; float: center;">Successfully cancelled the selected booking..!!</h1></center>
    <?php
}

else if ($val == 1) {
    $update_cat = "UPDATE category SET isCancelled=1 WHERE id = $Category_ID";

    if ($mysqli->query($update_cat) === FALSE) {
        echo "Error updating record: " . $mysqli->error;
    }

    $sel_mode = "select * from booking join category on category.id=booking.categoryId where category.id = $Category_ID and bookingStatus != 'Cancel'";
    $res_mode = $mysqli->query($sel_mode);
    if ($res_mode->num_rows > 0) {
        $update1 = "UPDATE booking join category on category.id=booking.categoryId SET bookingStatus='Cancel' WHERE id = $Category_ID";

        ?>
        <center><h1 style="color: grey; float: center;">Following bookings stand cancelled due to cancellation of "<?php echo $modeName[0]; ?>" under Category Id - <?php echo $Category_ID; ?></h1></center>
        <?php
        if ($mysqli->query($update1) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }

        $select_sql = "select * from booking join category on category.id=booking.categoryId where category.id = $Category_ID";

        // echo $select_sql;

        $result = $mysqli->query($select_sql);
        if ($result->num_rows > 0) {
        ?>
        <table class="css-serial">
          <thead>
            <tr>
              <th><center>S.No</center></th>
              <th><center>Mode</center></th>
              <th><center>Class</center></th>
              <th><center>Booking Date</center></th>
              <th><center>Start Date</center></th>
              <th><center>End Date</center></th>
              <th><center>Customer Name</center></th>
              <th><center>Payment Mode</center></th>
              <th><center>Amount</center></th>
              <th><center>Booking Status</center></th>
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
                <td><?php echo date('d-M-Y', strtotime($row['bookingDate'])) ?></td>
                <td><?php echo date('d-M-Y', strtotime($row['startTime'])) ?></td>
                <td><?php echo date('d-M-Y', strtotime($row['endTime'])) ?></td>
                <td><?php echo $row["CustomerName"] ?></td>
                <td><?php echo $row["PaymentMode"] ?></td>
                <td>INR <?php echo $row["finalPrice"] ?></td>
                <td><?php echo $row["bookingStatus"] ?></td>
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
    <br><br>
    <center><h1 style="color: grey; float: center;">No CONFIRMED or ONGOING bookings found of category - "<?php echo $modeName[0]; ?>" under the Category Id - <?php echo $Category_ID; ?><br>
    Cancelled the selected mode !!
    </h1></center>
    <?php
  }
}
?>

</body>
</html> 