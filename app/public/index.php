<?php

require '../vendor/autoload.php';

require_once '../Controller/HomeController.php';
require_once '../Controller/BookingController.php';
require_once '../Model/Booking.php';
require_once '../Repository/BookingRepository.php';
require_once '../Service/CsvResponseGenerator.php';
require_once '../Service/MySQL.php';

use App\Controller\BookingController;
use App\Controller\HomeController;
use App\Repository\BookingRepository;
use App\Service\CsvResponseGenerator;
use App\Service\MySQL;
use Symfony\Component\Serializer\Encoder\CsvEncoder;

$controllers = [
    'home' => new HomeController(),
    'booking' => new BookingController(
        new BookingRepository(
            new MySQL(),
        ),
        new CsvResponseGenerator(
            new CsvEncoder(),
        ),
    ),
];

$requestedRoute = $_GET['route'] ?? '';
$action = $_GET['action'] ?? null;

function isRouteValid(string $requestedRoute, ?string $action, array $controllers): bool
{
    return !empty($requestedRoute)
        && array_key_exists($requestedRoute, $controllers)
        && null !== $action
        && method_exists($controllers[$requestedRoute], $action);
}

if (!isRouteValid($requestedRoute, $action, $controllers)) {
    call_user_func($controllers['home']);
    exit;
}

call_user_func([$controllers[$requestedRoute], $action]);
