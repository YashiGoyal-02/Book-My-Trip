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
    $prevCard = $_POST['prevCard'];
    $Booking_ID = $_POST["booking_id"];
    // echo $prevCard;

    $query_pnr ="select PNR from booking where bid = $Booking_ID";
    $resultPNR = $mysqli->query($query_pnr);
    $pnr = mysqli_fetch_array($resultPNR);

    $select_card = "select * from carddetails";
    $result_card = $mysqli->query($select_card);


    if ($prevCard == 1) {
        if ($result_card->num_rows > 0) {
            while($row1 = $result_card->fetch_assoc()) {
                if ($row1['cardNum']==$num && $row1['name']==$name) {
                    if ($row1['cvv']==$cvv) {
                        $update = "UPDATE booking SET bookingStatus='Confirm' WHERE bid = $Booking_ID";

                        if ($mysqli->query($update) === FALSE) {
                            echo "Error updating record: " . $conn->error;
                        }
    ?>

                        <h1 style="color: grey;">Congratulations User, your booking has been confirmed.<br>
                                PNR Number - <?php echo $pnr[0]; ?></h1><br><br>
                        <h3>Click on the below button to make another booking</h3>
                        <form action="index.php" method="post">
                            <button name="start">Another Booking !!</button>
                        </form>
                        <?php     
                        // break;                  
                    }

                    else {
                        $updateCancel = "UPDATE booking SET bookingStatus='Cancel' WHERE bid = '$Booking_ID'";
                        if ($mysqli->query($updateCancel) === FALSE) {
                            echo "Error updating record: " . $conn->error;
                        } 

                        echo '<script type ="text/JavaScript">';  
                        echo 'alert("Wrong CVV - Please Try Again")';  
                        echo '</script>'; 

                        

                        $select_cat = "select * from booking join category on category.id=booking.categoryId
                                        where booking.bid='$Booking_ID'";
                        echo $select_cat;
                        $result_cat = $mysqli->query($select_cat);
                        if ($result_cat->num_rows == 1) {
                            $rowCat = $result_cat->fetch_assoc();
                            $from = $rowCat['source'];
                            $to = $rowCat['destination'];
                            $mode = $rowCat['name'];
                            $date = date('Y-m-d', strtotime($rowCat['startTime']));


                            ?>
                                <form action="user.php" method="post">
                                    <input type="hidden" name="mode" id="mode" value=<?php echo $mode; ?>>
                                    <input type="hidden" name="from" id="from" value=<?php echo $from; ?>>
                                    <input type="hidden" name="to" id="to" value=<?php echo $to; ?>>
                                    <input type="hidden" name="date" id="date" value=<?php echo $date; ?>>
                                    <br><br><br>
                                    <center>
                                    <h1>Invalid CVV</h1><br>
                                    <button name="submit" id="submit" class="submit" value=1 style="font-size: 25px;">Try Booking Again !</button>
                                    </center>
                                </form>

                            <?php
                            // break;
                        }
                    }
                }
            }
        }
    }

    else {
        // $Booking_ID = $_POST["booking_id"];

        $update = "UPDATE booking SET bookingStatus='Confirm' WHERE bid = $Booking_ID";

        if ($mysqli->query($update) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }

        

    ?>

        <h1 style="color: grey;">Congratulations User, your booking has been confirmed.<br>
            PNR Number - <?php echo $pnr[0]; ?></h1><br><br>
        <h3>Click on the below button to make another booking</h3>
        <form action="index.php" method="post">
            <button name="start">Another Booking !!</button>
        </form>

    <?php
    }

    
    // echo isset($_POST['card']);
    if (isset($_POST['card'])) {

        $flag = 0;

        // $select_card = "select * from carddetails";
        // $result_card = $mysqli->query($select_card);
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