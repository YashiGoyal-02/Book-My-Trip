 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />
</head>
<!-- <body style="background-color: #eacdbc"> -->
<body style="background-color: #eacdbc">


	<nav id="navbar" class="navbar order-last order-lg-0">
 		<h3 style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;">BookMyTrip</h3>
        <ul style="float: right;">
          <li><a class="nav-link scrollto active" href="#">Book a Ticket</a></li>
          <li><a class="nav-link scrollto" href="status.php">Booking Status</a></li>
		  <li><a class="nav-link scrollto" href="../Booking/BookingAdmin/login.php">Admin Page</a></li>
        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
      </nav>

	<br><br>
 	<center><h1 style="font-size: 50px;">Welcome to BookMyTrip !!</h1></center>
 	
	<div class="row">
		<div class="col-md-2">
			<form action="user.php" method="post">
			<label for="mode">Choose a service :</label>
				<select name="mode" id="mode" required>
					<option value="" selected disabled>--</option>
					<option value="Flights">Flights</option>
					<option value="Trains">Trains</option>
					<option value="Bus">Bus</option>
				</select><br><br>
				From: <input type="text" name="from" required><br><br>
				To: <input type="text" name="to" required><br><br>
				Date: <input type="date" name="date" id="myDate" required><br><br>
				<div class="button" style="float: center">
 					<input type="submit">
					<input type="reset">
				</div>
			</form>
		</div> 
	</div>


	<script>
		function getTodaysDate(){
			date = new Date();
			day = date.getDate();
			month = date.getMonth() + 1;
			year = date.getFullYear();

			if (month < 10) month = "0" + month;
			if (day < 10) day = "0" + day;

			today = year + "-" + month + "-" + day; 

			return today;
		}

		todayDate = getTodaysDate();
		document.getElementById("myDate").min = todayDate;
	</script>

</body>
</html> 