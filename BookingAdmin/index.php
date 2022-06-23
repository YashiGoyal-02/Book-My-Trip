 
<!DOCTYPE html>
<html>
<head>

	<style>
        #logo {
            text-decoration: none;
        }
    </style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="../css/style.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />
</head>
<!-- <body style="background-color: #eacdbc"> -->
<body style="background-color: #eacdbc">


	<nav id="navbar" class="navbar order-last order-lg-0">
	<a id="logo" style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;" class="nav-link scrollto active" href="../index.php">BookMyTrip</a>
	<ul style="float: right;">
          <li><a id="logo" class="nav-link scrollto active" href="index.php">Add new category</a></li>
          <li><a id="logo" class="nav-link scrollto" href="booking.php">View Bookings</a></li>
		  <li><a id="logo" class="nav-link scrollto" href="category.php">View Categories</a></li>    
		</ul>
    </nav>

	<br><br>
 	<center><h1 style="font-size: 50px;">Welcome to BookMyTrip !!</h1></center>

	<div class="form1">
		<form action="user.php" method="post">
		<label for="mode">Choose a service :</label>
			<select name="mode" id="mode" required>
			    <option value="" selected disabled>--</option>
				<option value="Flights">Flights</option>
				<option value="Trains">Trains</option>
				<option value="Bus">Bus</option>
			</select><br><br>
            Class: <input type="text" name="class"><br><br>
            Airline: <input type="text" name="airline"><br><br>
			From: <input type="text" name="from" required><br><br>
			To: <input type="text" name="to" required><br><br>
            Price: <input type="text" name="price" required><br><br>
			Start Date: <input type="date" name="date" id="myDate" required><br><br>
            Start Time: <input type="time" name="time" id="myTime" required><br><br>
            End Date: <input type="date" name="edate" id="emyDate" required><br><br>
            End Time: <input type="time" name="etime" id="emyTime" required><br><br>
			<div class="button" style="float: center">
		        <input type="submit">
			    <input type="reset">
            </div>
		</form>
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
        document.getElementById("emyDate").min = todayDate;
	</script>

</body>
</html> 