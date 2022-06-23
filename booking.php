<?php 
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body style="background-color: #eacdbc">

	<nav id="navbar" class="navbar order-last order-lg-0">
 		<h3 style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;">BookMyTrip</h3>
        <ul style="float: right;">
          <li><a class="nav-link scrollto active" href="index.php">Book a Ticket</a></li>
          <li><a class="nav-link scrollto" href="status.php">Booking Status</a></li>
		</ul>
    </nav>
	<br><br><br>

	<?php 
	$mysqli = new mysqli("localhost","root","","booking");

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	$categoryId = $_GET['id_category'];
	// echo $categoryId;
	?>
 	<h1 style="color: grey; float: center;">Enter your details to confirm the booking !!</h1>

	<div class="form1">
		<form action="book_user.php" method="post">
			Name: <input type="text" name="name" required><br><br>
            <label for="quantity" required>Number of Tickets:</label>
            <input type="number" id="qut" name="quantity" min="1" max="30" onkeyup="myFunction()"><br><br>
			<input type="hidden" id="price" name="price" value="<?php echo $_GET['price']; ?>">

			<label for="amount" required>Amount:</label>
			<input type="text" id="amount" name="amount" value="0" readonly><br><br>
			Email ID: <input type="email" name="email" required><br><br>
            ID Proof: <input type="text" name="proof" required><br><br>
            <label for="payment">Payment Mode :</label>
			<select name="payment" id="payment" required>
			    <option value="" selected disabled>--</option>
				<option value="Rupay">Rupay Debit Card</option>
				<option value="Visa">Visa Debit Card</option>
				<option value="Maestro">Maestro Debit Card</option>
				<option value="Master">MasterCard Debit Card</option>
				<option value="Credit">Credit Card</option>
			</select><br><br>

			<input type="checkbox" id="rem_card" name="rem_card" value=1>
            <label for="rem_card"> Use my saved card</label><br><br>
			
			<div class="button" style="float: center">
				<form action="book_user.php" method="post">
					<button name="Category" value=<?php echo htmlspecialchars($categoryId); ?>>Submit</button>
				</form>
			    <input type="reset">
            </div>
		</form>
	</div>
	
	<script>
		function myFunction() {
			var quantity = document.getElementById('qut').value;
			var price = document.getElementById('price').value;
			var result = parseInt(quantity)*parseInt(price);
			console.log(quantity);
			console.log(price);
			console.log(result);

			// alert(result);
			
			// var amount = document.getElementById('amount').value(result);

			document.getElementById('amount').value=result;
		}
		
	</script>
</body>
</html> 