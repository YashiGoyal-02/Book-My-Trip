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
        <br><br><br><br><br><br>
    </nav>

<?php

    $mysqli = new mysqli("localhost","root","","booking");

    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $num = $_POST['cardNumb'];
    // echo $num;
    $name = $_POST['cardName'];
    // echo $name;
    $expiry = $_POST['date'];
    $cvv = $_POST['cvv'];
    $Booking_ID = $_POST["booking_id"];
    // echo $prevCard;

    

    
        // $Booking_ID = $_POST["booking_id"];

        $update = "UPDATE booking SET bookingStatus='Confirm' WHERE bid = $Booking_ID";

        if ($mysqli->query($update) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    ?>

        <h1 style="color: grey;">Congratulations User, your booking has been confirmed.</h1><br>
        <h3>Click on the below button to make another booking</h3>
        <form action="index.php" method="post">
            <button name="start">Another Booking !!</button>
        </form>

    <?php
    

    
    // echo isset($_POST['card']);
    if (isset($_POST['card'])) {

        $flag = 0;

        $select_card = "select * from carddetails";
        $result_card = $mysqli->query($select_card);
        if ($result_card->num_rows > 0 && $flag==0) {
            while($row = $result_card->fetch_assoc()) {
                if(!($row['cardNum']==$num && $row['name']==$name && $row['ExpDate']==$expiry && $row['cvv']==$cvv && $flag==0)) {

                    $sql_card = "insert into carddetails (cardNum, name, ExpDate, cvv)
                    values ('$num', '$name', '$expiry', '$cvv')";

                    if ($mysqli->query($sql_card) === FALSE) {
                    echo "Error: " . $sql_card . "<br>" . $mysqli->error;
                    }
                    
                    $flag=1;

                    $last_id_card = $mysqli->insert_id;

                    break;
                }
            }
        }

        else if ($result_card->num_rows == 0 && $flag==0) {
            $sql_card = "insert into carddetails (cardNum, name, ExpDate, cvv)
            values ('$num', '$name', '$expiry', '$cvv')";

            if ($mysqli->query($sql_card) === FALSE) {
            echo "Error: " . $sql_card . "<br>" . $mysqli->error;
            }
            
            $flag=1;

            $last_id_card = $mysqli->insert_id;   
        }

    }
    ?>
    

</body>
</html> 