<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use App\Routes;
use App\Controller\PaymentController;

require_once 'helper.php';
require_once 'config.php';

Routes::get('/', function () {
    return view('app', []);
});

Routes::post('/create-session', function () {
    PaymentController::createSession();
});

$routes = Routes::getInstance();
$routes->dispatch();
