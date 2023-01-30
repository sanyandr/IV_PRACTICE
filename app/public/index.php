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

$app->get('/ReviewsOnline/Home', '\mainNamespace\Controller\Controller:HomeController');

$app->run();