<?php

namespace App\Model;

require_once 'AbstractBaseModel.php';

use DateTimeInterface;

class Booking extends AbstractBaseModel
{
    private string $reservationNumber;
    private string $destination;
    private float $price;
    private string $people;
    private string $contact;
    private DateTimeInterface $travelDate;
    private DateTimeInterface $createdAt;

    public function getReservationNumber(): string
    {
        return $this->reservationNumber;
    }

    public function setReservationNumber(string $reservationNumber): void
    {
        $this->reservationNumber = $reservationNumber;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPeople(): string
    {
        return $this->people;
    }

    public function setPeople(string $people): void
    {
        $this->people = $people;
    }

    public function getContact(): string
    {
        return $this->contact;
    }

    public function setContact(string $contact): void
    {
        $this->contact = $contact;
    }

    public function getTravelDate(): DateTimeInterface
    {
        return $this->travelDate;
    }

    public function setTravelDate(DateTimeInterface $travelDate): void
    {
        $this->travelDate = $travelDate;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getDescription(): string
    {
        $description = 'Booking #' . $this->getReservationNumber() . ' to ' . $this->getDestination() . '<br/>';
        $description .= 'Travel Date: ' . $this->getTravelDate()->format('Y-m-d') . '<br/>';
        $description .= 'Price: $' . number_format($this->getPrice(), 2) . '<br/>';
        $description .= 'People: ' . $this->getPeople() . '<br/>';
        $description .= 'Contact: ' . $this->getContact() . '<br/>';
        $description .= 'Created At: ' . $this->getCreatedAt()->format('Y-m-d H:i:s') . '<br/>';
        
        return $description;
    }
}
