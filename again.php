<?php 
// Start the session
session_start();
?>

<html>

<head>
<link href="css/style.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />

</head>

<body style="background-color: #eacdbc">

    <nav id="navbar" class="navbar order-last order-lg-0">
 		<h3 style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; float: right">BookMyTrip</h3>
        <br><br><br><br>
    </nav>

<?php

    $mysqli = new mysqli("localhost","root","","booking");

    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $button_Value = $_GET['price'];
    $payment_Mode = $_GET['payment'];
    $Booking_ID = $_GET['id_category'];
    $status = $_GET['value'];
   
    if ($status == 'cancel') {
        //Cancel Booking
        $updateCancel = "UPDATE booking SET bookingStatus='Cancel' WHERE bid = '$Booking_ID'";

        if ($mysqli->query($updateCancel) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }

        ?>

        <h1 style="color: grey;">Dear User, your booking is cancelled.</h1><br>
        <h3>Click on the below button to make another booking</h3>
        <form action="index.php" method="post">
			<button name="start">Another Booking !!</button>
		</form>
    
        <?php
    }

    else if ($status == 'pay') {
        //Pay Now
        if ($payment_Mode != 'Credit') {
        ?>
            <h1 style="color: grey;"><?php echo $payment_Mode ?> Debit Card</h1>

        <?php
        }

        else {
            ?>
            <h1 style="color: grey;"><?php echo $payment_Mode ?> Card</h1>

            <?php
        }
        ?>

        <form action="statusConfirm.php" method="post">
            Card Number: <input id="cardNumb" type="text" name="cardNumb" required><br><br>
            Name on Card: <input id="cardName" type="text" name="cardName" required><br><br>
            Expiring in: <input id="date" type="date" name="date" required><br><br>
            CVV: <input type="password" name="cvv" required><br><br> 

            <input type="checkbox" id="card" name="card" value=1>
            <label for="card"> Remember my card</label><br><br>

            <button id="booking_id" name="booking_id" value=<?php echo $Booking_ID; ?>>Submit</button>
			<input type="reset">
		</form>

        <?php

    }
?>


</body>
</html> 