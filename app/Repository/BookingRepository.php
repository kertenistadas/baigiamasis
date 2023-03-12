<?php

namespace App\Repository;

require_once 'RepositoryInterface.php';

use App\Model\Booking;
use App\Service\MySQL;
use mysqli_result;

class BookingRepository implements RepositoryInterface
{
    public function __construct(
        private MySQL $mySQL
    ) {
    }

    public function findAll(): array
    {
        $results = $this->mySQL->query('SELECT * FROM booking');

        $rows = [];

        while ($row = $results->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function findAllByDestination(string $destination): array
    {
        $query = sprintf('SELECT * FROM booking WHERE `destination` LIKE "%s"', $destination);
        $results = $this->mySQL->query($query);

        $rows = [];

        while ($row = $results->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function findOneById(int $id): array
    {
        $results = $this->mySQL->query('SELECT * FROM booking WHERE id=' . $id);

        return $results->fetch_assoc();
    }

    public function insert(Booking $booking): mysqli_result|bool|null
    {
        $query = sprintf(
            "INSERT INTO `booking`(`reservation_number`, `destination`, `price`, `people`, `contact`, `travel_date`, `created_at`) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $booking->getReservationNumber(),
            $booking->getDestination(),
            $booking->getPrice(),
            $booking->getPeople(),
            $booking->getContact(),
            $booking->getTravelDate()->format('Y-m-d H:i:s'),
            $booking->getCreatedAt()->format('Y-m-d H:i:s')
        );

        return $this->mySQL->query($query);
    }

    public function update(Booking $booking): mysqli_result|bool|null
    {
        $query = sprintf(
            "UPDATE `booking` SET `reservation_number`='%s', `destination`='%s', `price`=%s, `people`='%s', `contact`='%s', `travel_date`='%s' WHERE id=%s",
            $booking->getReservationNumber(),
            $booking->getDestination(),
            $booking->getPrice(),
            $booking->getPeople(),
            $booking->getContact(),
            $booking->getTravelDate()->format('Y-m-d H:i:s'),
            $booking->getId(),
        );

        return $this->mySQL->query($query);
    }

    public function delete(int $id): mysqli_result|bool|null
    {
        $query = sprintf("DELETE FROM `booking` WHERE id=%s", $id);

        return $this->mySQL->query($query);
    }
}
