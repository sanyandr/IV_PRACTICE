<?php

use Slim\Factory\AppFactory;
require __DIR__ . '/../../vendor/autoload.php';
require_once "../db/databaseLogic.php";

$app = AppFactory::create();

$app->setBasePath("/app/public");
//Hello World;
$app->get('/hello', '\mainNamespace\Controller\HelloWorldController:index');

//API get review by ID
$app->get('/api/review/{ID}', \mainNamespace\Controller\ReviewByIDController::class . ':index');
//Get all reviews by {page №}
$app->get('/api/reviews/page/[{page}]', \mainNamespace\Controller\ReviewsByPages::class . ':index');

$app->run();