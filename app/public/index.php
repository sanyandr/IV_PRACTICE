<?php
use Slim\Factory\AppFactory;
require __DIR__ . '/../../vendor/autoload.php';
require_once "../db/databaseLogic.php";

$app = AppFactory::create();

$app->setBasePath("/app/public");
//Hello World;
$app->get('/hello', '\mainNamespace\Controller\Controller:HelloWorldController');

//API get review by ID
$app->get('/api/review/{ID}', \mainNamespace\Controller\Controller::class . ':ReviewByIDController');
//Get all reviews by {page №}
$app->get('/api/reviews/page/[{page}]', \mainNamespace\Controller\Controller::class . ':ReviewsByPagesController');

$ini = parse_ini_file('../dist/admin.ini');
//echo $ini['db_password'];
$admin_password = $ini['db_password'];
$admin_name = $ini['db_user'];

$app->get('/ReviewsOnline/Home', '\mainNamespace\Controller\Controller:HomeController');


$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "path" => "/ReviewsOnline/AdminConsole/{ID}",
    "realm" => "Protected",
    "users" => [
        "$admin_name" => "$admin_password",
    ]
]));
$app->get('/ReviewsOnline/AdminConsole/{ID}', \mainNamespace\Controller\Controller::class . ':DeleteController');
$app->run();