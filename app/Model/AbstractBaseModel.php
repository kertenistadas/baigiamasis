<?php

namespace App\Model;

abstract class AbstractBaseModel
{
    protected int $id;

    public function __construct()
    {
        date_default_timezone_set( 'Europe/Vilnius');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public abstract function getDescription(): string;
}