<?php
use Slim\Factory\AppFactory;
require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/app/public");
//Hello World;
$app->get('/hello', 'Sanyandr\Practice\Controller\Controller:helloWorld');

//API get review by ID
$app->get('/api/review/{ID}', \Sanyandr\Practice\Controller\Controller::class . ':reviewByID');
//Get all reviews by {page №}
$app->get('/api/reviews/page/[{page}]', \Sanyandr\Practice\Controller\Controller::class . ':reviewsByPages');

$ini = parse_ini_file('../dist/admin.ini');
//echo $ini['db_password'];
$admin_password = $ini['db_password'];
$admin_name = $ini['db_user'];

$app->get('/ReviewsOnline/Home', 'Sanyandr\Practice\Controller\Controller:home');


$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "path" => "/ReviewsOnline/AdminConsole/{ID}",
    "realm" => "Protected",
    "users" => [
        "$admin_name" => "$admin_password",
    ]
]));
$app->get('/ReviewsOnline/AdminConsole/{ID}', \Sanyandr\Practice\Controller\Controller::class . ':delete');
$app->run();