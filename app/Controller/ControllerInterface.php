<?php

namespace App\Controller;
interface ControllerInterface
{
    public function __invoke(): void;
}
