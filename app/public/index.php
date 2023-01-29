<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';
require_once "../db/databaseLogic.php";

$app = AppFactory::create();

$app->setBasePath("/app/public");
//Hello World;
$app->get('/hello', '\mainNamespace\Controller\HelloWorldController:index');

//read about using variables in route-string
//$app->get('/page/{ID}', '\mainNamespace\Controller\ReviewByIDController:index($ID)');

$app->run();