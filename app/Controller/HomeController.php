<?php

namespace App\Controller;

require_once 'ControllerInterface.php';

class HomeController implements ControllerInterface
{
    public function __invoke(): void
    {
        include '../View/HomeView.php';
    }
}
