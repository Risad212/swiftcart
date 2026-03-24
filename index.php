<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use App\Routes;
use App\controller\inputController;

require_once 'helper.php';

define('BASE_URL', baseUrl());


Routes::get('/', function () {
    return view('app', ['name' => 'Risad']);
});

Routes::get('/checkout', function () {
    return view('/checkout', ['name' => 'risad', 'email' => 'risad@gmail.com']);
});

Routes::post('/checkout', function ($request) {
    $inputController = new inputController();
    $inputHandle     = $inputController->inputHandle($request);
});

$routes = Routes::getInstance();
$routes->dispatch();
