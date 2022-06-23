<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />
    <title>Login Page</title>

    <style>
        #logo {
            text-decoration: none;
        }
    </style>
</head>
 
<body style="background-color: #eacdbc">

<?php

$mysqli = new mysqli("localhost","root","","booking");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$stmt = $mysqli->prepare("SELECT * FROM adminlogin");
	$stmt->execute();

    $resultSet = $stmt->get_result();
    $users = $resultSet->fetch_all(MYSQLI_ASSOC);
	// $users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['username'] == $username) && ($user['password'] == $password)) {
				header("location: index.php");
		}
		else {

			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION -- ADMIN NOT VERIFIED')";
            // echo "alert('WRONG INFORMATION')";
            // echo "alert('WRONG INFORMATION')";
			echo "</script>";
			?>
			<br><br><br>
			<center>
				<h1>Invalid Credentials</h1>
				<a href="../BookingAdmin/login.php"><button style="font-size: 25px;">Try Again</button></a>
			</center>
			<?php
			die();
		}
	}
}

?>

</body>
</html>
