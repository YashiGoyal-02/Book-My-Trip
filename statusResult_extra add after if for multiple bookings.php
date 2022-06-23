else if ($result->num_rows > 1) {
    ?>
    <h1>Multiple bookings found --<br></h1>
    <?php

    if ($mode == "Flights") {
    ?>
    <table class="css-serial">
        <thead>
            <tr>
                <th><center>S.No</center></th>
                <th><center>Airline</center></th>
                <th><center>Class</center></th>
                <th><center>Amount</center></th>
                <th><center>Flight Date</center></th>
                <th><center>Booking Date</center></th>
                <th><center>From</center></th>
                <th><center>To</center></th>
                <th><center>Customer Name</center></th>
                <th><center>Booking Status</center></th>
                <th></th>
            </tr>
        </thead>

    <?php

    while($row = $result->fetch_assoc()) {
        $id = $row["bid"];
    ?>
        <tbody>
                <tr>
                    <td></td>
                    <td><?php echo $row["airline"] ?></td>
                    <td><?php echo $row["type"] ?></td>
                    <td>INR <?php echo $row["finalPrice"] ?></td>
                    <td><?php echo date('d M, Y', strtotime($row['startTime'])) ?></td>
                    <td><?php echo date('d M, Y', strtotime($row['bookingDate'])) ?></td>
                    <td><?php echo $row["source"] ?></td>
                    <td><?php echo $row["destination"] ?></td>
                    <td><?php echo $row["CustomerName"] ?></td>
                    <td><?php echo $row["bookingStatus"] ?></td>
                    <?php
                        if ($row["bookingStatus"] == 'Ongoing') {
                    ?>
                            <td><a href="../Booking/again.php?id_category=<?php echo htmlspecialchars($id); ?>&price=<?php echo $row["finalPrice"] ?>&payment=<?php echo $row["PaymentMode"] ?>&value=pay"><button>Pay Now !</button></a></td>
                    <?php
                        }

                        else if ($row["bookingStatus"] == 'Confirm') {
                            ?>
                            <td><a href="../Booking/again.php?id_category=<?php echo htmlspecialchars($id); ?>&price=<?php echo $row["finalPrice"] ?>&payment=<?php echo $row["PaymentMode"] ?>&value=cancel"><button>Cancel Booking !</button></a></td>
                            <?php
                        }

                        else {
                            ?>
                            <td></td>
                            <?php
                        }
                    ?>
                    
                </tr>
        </tbody>
            
        <?php
        }
        ?>
    </table>
    <?php
    }

    else {
    ?>
    <table class="css-serial">
    <thead>
        <tr>
                <th><center>S.No</center></th>
                <th><center>Class</center></th>
                <th><center>Amount</center></th>
                <th><center><?php echo $mode ?> Date</center></th>
                <th><center>Booking Date</center></th>
                <th><center>From</center></th>
                <th><center>To</center></th>
                <th><center>Customer Name</center></th>
                <th><center>Booking Status</center></th>
                <th></th>
        </tr>
    </thead>

    <?php
    while($row = $result->fetch_assoc()) {
        $id = $row["bid"];
    ?>
    <tbody>
        <tr>
                <td></td>
                <td><?php echo $row["type"] ?></td>
                <td>INR <?php echo $row["finalPrice"] ?></td>
                <td><?php echo date('d M, Y', strtotime($row['startTime'])) ?></td>
                <td><?php echo date('d M, Y', strtotime($row['bookingDate'])) ?></td>
                <td><?php echo $row["source"] ?></td>
                <td><?php echo $row["destination"] ?></td>
                <td>INR <?php echo $row["CustomerName"] ?></td>
                <td><?php echo $row["bookingStatus"] ?></td>
                <?php
                        if ($row["bookingStatus"] == 'Ongoing') {
                    ?>
                            <td><a href="../Booking/final.php?id_category=<?php echo htmlspecialchars($id); ?>&price=<?php echo $row["price"] ?>&payment=<?php echo $row["PaymentMode"] ?>"><button name="final" value=<?php echo htmlspecialchars($row['finalPrice']); ?>>Pay Now !</button></a></td>
                    <?php
                        }

                        else {
                            ?>
                            <td></td>
                            <?php
                        }
                ?>
        </tr>
    </tbody>
    
    <?php
    }
    ?>
    </table>

    <?php
    }
}
