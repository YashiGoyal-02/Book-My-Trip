 
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
          <li><a class="nav-link scrollto" href="index.php">Book a Ticket</a></li>
          <li><a class="nav-link scrollto active" href="status.php">Booking Status</a></li>
        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
      </nav>

	<br><br>
 	<center><h1 style="font-size: 50px;">Check your Booking Status now !!</h1></center>

	<div class="form1">
		<form action="statusResult.php" method="post">
            PNR: <input type="text" name="pnr" required><br><br>
			<div class="button" style="float: center">
		        <input type="submit">
			    <input type="reset">
            </div>
		</form>
	</div> 

</body>
</html> 