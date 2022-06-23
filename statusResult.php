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
 		<h3 style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; float: right">BookMyTrip</h3>
        <br><br><br><br><br><br>
    </nav>

<?php

// database connection
$mysqli = new mysqli("localhost","root","","booking");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
// echo "success"

$pnr = $_POST['pnr'];


$select_sql = "select * from booking where PNR = '$pnr'";

// echo $select_sql;

$result = $mysqli->query($select_sql);
// $status = mysqli_fetch_array($result);


if ($result->num_rows == 0) {
    ?>
    <h1 style:"color: grey;">Sorry, No bookings found..</h1>
    <?php
}

else if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
    ?>
    <h1>The current status of your booking is <?php echo $row['bookingStatus']; ?></h1>
    <?php


        if ($row["bookingStatus"] == 'Ongoing') {
        ?>
            <a href="../Booking/final.php?id_category=<?php echo $row["bid"]; ?>&price=<?php echo $row["finalPrice"] ?>&payment=<?php echo $row["PaymentMode"] ?>&cardId=0&remValue=0&cardNumber=0&Name_Card=0&cardExpiry=0&cardCVV=0&flagValue=0"><button style="font-size: 25px;">Confirm Booking Now !</button></a>
        <?php
        }

        else {
        ?>
            <a href="../Booking/index.php"><button style="font-size: 20px;">Go Back to Home Page !</button></a>
        <?php
        }
    }
}

?>


</body>
</html> 