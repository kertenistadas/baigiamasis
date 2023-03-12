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
        <title>Booking overview</title>
    </head>
    <body>
        <?php require_once __DIR__ . '/../Menu.php'; ?>
        <fieldset>
            <legend>Booking list</legend>
            <a href="/?route=booking&action=export">Export to CSV</a><br/><br/>
            <form method="POST" action="/?route=booking&action=search">
                <input type="text" name="destination" placeholder="Enter destination to search for"/>
                <input type="submit" value="Submit">
            </form>
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
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($bookings as $booking) {
                    echo '<tr>';
                    echo '<td>' . $booking['id'] . '</td>';
                    echo '<td>' . $booking['reservation_number'] . '</td>';
                    echo '<td>' . $booking['destination'] . '</td>';
                    echo '<td>' . $booking['price'] . '</td>';
                    echo '<td>' . $booking['people'] . '</td>';
                    echo '<td>' . $booking['contact'] . '</td>';
                    echo '<td>' . $booking['travel_date'] . '</td>';
                    echo '<td>' . $booking['created_at'] . '</td>';
                    echo '<td>';
                    echo '<a href="/?route=booking&action=view&id=' . $booking['id'] . '">View</a> | ';
                    echo '<a href="/?route=booking&action=edit&id=' . $booking['id'] . '">Edit</a> | ';
                    echo '<a href="/?route=booking&action=delete&id=' . $booking['id'] . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </fieldset>
    </body>
</html>
