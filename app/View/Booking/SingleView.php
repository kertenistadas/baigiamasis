<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            table tr th, table tr td {
                padding: 0 15px;
            }
        </style>
        <title>Booking <?php echo $_GET['id']; ?></title>
    </head>
    <body>
        <?php require_once __DIR__ . '/../Menu.php'; ?>
        <fieldset>
            <legend>Booking <?php echo $_GET['id']; ?></legend>
            <table style="border: 3px solid #000;">
                <tr>
                    <th>ID</th>
                    <th>Reservation number</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th>People</th>
                    <th>Contact</th>
                    <th>Travel date</th>
                    <th>Created at</th>
                </tr>
                <?php
                    echo '<tr>';
                    echo '<td>' . $booking['id'] . '</td>';
                    echo '<td>' . $booking['reservation_number'] . '</td>';
                    echo '<td>' . $booking['destination'] . '</td>';
                    echo '<td>' . $booking['price'] . '</td>';
                    echo '<td>' . $booking['people'] . '</td>';
                    echo '<td>' . $booking['contact'] . '</td>';
                    echo '<td>' . $booking['travel_date'] . '</td>';
                    echo '<td>' . $booking['created_at'] . '</td>';
                    echo '</tr>';
                ?>
            </table>
        </fieldset>
    </body>
</html>
