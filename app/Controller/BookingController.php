<?php

namespace App\Controller;

use App\Model\Booking;
use App\Repository\BookingRepository;
use App\Service\CsvResponseGenerator;
use DateTime;
use RuntimeException;

class BookingController implements ControllerInterface
{
    public function __construct(
        private BookingRepository $bookingRepository,
        private CsvResponseGenerator $csvResponseGenerator,
    ) {
    }

    public function __invoke(): void
    {
        $this->list();
    }

    public function new(): void
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $booking = $this->createBookingFromRequest();

            if ($booking->getTravelDate() < (new DateTime())) {
                throw  new RuntimeException('Travel date cannot be in the past');
            }

            $this->bookingRepository->insert($booking);
            $this->redirectToListPage();
        }

        include '../View/Booking/NewView.php';
    }

    public function list(): void
    {
        $bookings = $this->bookingRepository->findAll();

        include '../View/Booking/ListView.php';
    }

    public function view(): void
    {
        $booking = $this->bookingRepository->findOneById($_GET['id']);

        include '../View/Booking/SingleView.php';
    }

    public function edit(): void
    {
        $booking = $this->bookingRepository->findOneById($_GET['id']);

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $updatedBooking = $this->createBookingFromRequest();

            if ($updatedBooking->getTravelDate() < (new DateTime())) {
                throw  new RuntimeException('Travel date cannot be in the past');
            }

            $this->bookingRepository->update($updatedBooking);
            $this->redirectToListPage();
        }

        include '../View/Booking/EditVIew.php';
    }

    public function delete(): void
    {
        $this->bookingRepository->delete($_GET['id']);
        $this->redirectToListPage();
    }

    public function export(): void
    {
        $bookings = $this->bookingRepository->findAll();

        $this->csvResponseGenerator->create($bookings);
    }

    public function search(): void
    {
        $bookings = $this->bookingRepository->findAllByDestination($_POST['destination']);

        include '../View/Booking/ListView.php';
    }

    private function createBookingFromRequest(): Booking
    {
        $booking = new Booking();

        if (isset($_GET['id'])) {
            $booking->setId($_GET['id']);
        }

        $booking->setReservationNumber($_POST['reservationNumber'] ?? '');
        $booking->setDestination($_POST['destination'] ?? '');
        $booking->setPrice(floatval($_POST['price']) ?? 0.00);
        $booking->setPeople($_POST['people'] ?? '');
        $booking->setContact($_POST['contact'] ?? '');
        $booking->setTravelDate(new DateTime($_POST['travelDate'] ?? 'now'));
        $booking->setCreatedAt(new DateTime());

        return $booking;
    }

    private function redirectToListPage(): void
    {
        header('Location: index.php?route=booking&action=list');
        exit;
    }
}