<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New booking</title>
    </head>
    <body>
        <?php require_once __DIR__ . '/../Menu.php'; ?>
        <form method="POST" action="/?route=booking&action=new">
            <fieldset>
                <legend>New booking</legend>

                <label for="reservation-number">Reservation number:</label><br/>
                <input type="text" id="reservation-number" name="reservationNumber"/><br/>

                <label for="destination">Destination</label><br/>
                <input type="text" id="destination" name="destination"/><br/>

                <label for="price">Price</label><br/>
                <input type="text" id="price" name="price"/><br/>

                <label for="people">People</label><br/>
                <input type="text" id="people" name="people"/><br/>

                <label for="contact">Contact</label><br/>
                <input type="text" id="contact" name="contact"/><br/>

                <label for="travel-date">Date</label><br/>
                <input type="text" id="travel-date" name="travelDate"/><br/>

                <br/><input type="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>
