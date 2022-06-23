<?php 
// Start the session
session_start();
?>

<html>

<head>
    <link href="css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php

// database connection
$mysqli = new mysqli("localhost","root","","booking");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// echo "success"


$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
function generate_string($input, $strength = 6) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}


$name = $_POST['name'];
$quantity = $_POST['quantity'];
$email = $_POST['email'];
$proof = $_POST['proof'];
$payment = $_POST['payment'];
$categoryId = $_POST['Category'];
$flag = 0;
$pnr = generate_string($permitted_chars, 6);
$Pnr_okay = 0;

$price = "select price from category where id=$categoryId ";
// echo $price;
$resultPrice = $mysqli->query($price);
$price1Ticket = mysqli_fetch_array($resultPrice);

$finalPrice = $price1Ticket[0] * $quantity;

$select_pnr = "select * from booking where bookingStatus != 'Cancel'";
$result_pnr = $mysqli->query($select_pnr);
do {
    if ($result_pnr->num_rows > 0) {
        while ($row_pnr = $result_pnr->fetch_assoc()) {
            if ($row_pnr['PNR'] == $pnr) {
                $pnr = generate_string($permitted_chars, 6);
                $Pnr_okay = 1;
                break;
            } 
            else {
                $Pnr_okay = 0;
            }
        }
    }
} while ($Pnr_okay == 1);


$sql = "insert into booking (categoryId, PNR, numTickets, finalPrice, CustomerName, emailId, IdProof, PaymentMode)
        values ('$categoryId', '$pnr', '$quantity', '$finalPrice', '$name', '$email', '$proof', '$payment')";

if ($mysqli->query($sql) === FALSE) {
   echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$last_id = $mysqli->insert_id;
// echo $last_id;
$query ="select bookingStatus from booking where bid='$last_id'";
$resultStatus = $mysqli->query($query);
$status = mysqli_fetch_array($resultStatus);

// Saved Card
$num = '';
$cardName = '';
$exp = '';
$cvv = '';
$id = '';
$remember = isset($_POST['rem_card']);


if (isset($_POST['rem_card'])) {
    $selCard = "select * from carddetails join booking on carddetails.name=booking.CustomerName 
                order by booking.bid DESC LIMIT 1";

    $result_card = $mysqli->query($selCard);
    if ($result_card->num_rows == 1) {
        while($row_card = $result_card->fetch_assoc()) {
            $num = $row_card['cardNum'];
            $cardName = $row_card['name'];
            // echo $cardName;
            $exp = $row_card['ExpDate']; 
            $cvv = $row_card['cvv'];
            $id = $row_card['id'];
            $flag = 1;
        }
    }

    else if ($result_card->num_rows == 0) {
        echo "No saved card found";
        $flag = 0;
    }
}

?>



<h1 style="color: grey; float: center;">The current status of your booking is <?php echo $status[0] ?></h1>
<br><br>

<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <a href="../Booking/final.php?id_category=<?php echo $last_id; ?>&price=<?php echo htmlspecialchars($finalPrice); ?>&payment=<?php echo $payment ?>&cardId=<?php echo $id ?>&cardNumber=<?php echo $num?>&Name_Card=<?php echo $cardName?>&cardExpiry=<?php echo $exp?>&cardCVV=<?php echo $cvv ?>&flagValue=<?php echo $flag?>&remValue=<?php echo $remember?>&value=1"><button name="final" value=<?php echo htmlspecialchars($finalPrice); ?>>Pay Now</button></a>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <a href="../Booking/final.php?id_category=<?php echo $last_id; ?>&price=0&payment=<?php echo $payment ?>&cardId=<?php echo $id ?>&cardNumber=<?php echo $num?>&Name_Card=<?php echo $cardName?>&cardExpiry=<?php echo $exp?>&cardCVV=<?php echo $cvv ?>&flagValue=<?php echo $flag?>&remValue=<?php echo $remember?>&value=1"><button name="final" value=0>Cancel Booking</button></a>
        </div>
    </div>
</div>

<br><br><br><br>
<div class="row">
    <!-- <div class="col-md-2"></div> -->
    <div class="col-md-6">
        <h2>Go Back to Home Page </h2>
        <a href="../Booking/index.php"><button style="font-size: 20px;">HOME</button></a>
    </div>
</div>

</body>
</html> 
