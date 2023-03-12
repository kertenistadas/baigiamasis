<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit booking <?php echo $_GET['id']; ?></title>
    </head>
    <body>
        <?php require_once __DIR__ . '/../Menu.php'; ?>
        <form method="POST" action="/?route=booking&action=edit&id=<?php echo $_GET['id']; ?>">
            <fieldset>
                <legend>Edit booking <?php echo $_GET['id']; ?></legend>

                <label for="reservation-number">Reservation number:</label><br/>
                <input type="text" id="reservation-number" name="reservationNumber" value="<?php echo $booking['reservation_number']; ?>"/><br/>

                <label for="destination">Destination</label><br/>
                <input type="text" id="destination" name="destination" value="<?php echo $booking['destination']; ?>"/><br/>

                <label for="price">Price</label><br/>
                <input type="text" id="price" name="price" value="<?php echo $booking['price']; ?>"/><br/>

                <label for="people">People</label><br/>
                <input type="text" id="people" name="people" value="<?php echo $booking['people']; ?>"/><br/>

                <label for="contact">Contact</label><br/>
                <input type="text" id="contact" name="contact" value="<?php echo $booking['contact']; ?>"/><br/>

                <label for="travel-date">Date</label><br/>
                <input type="text" id="travel-date" name="travelDate" value="<?php echo $booking['travel_date']; ?>"/><br/>

                <br/><input type="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>
