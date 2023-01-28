<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/app/public");

//Hello World;
$app->get('/hello', '\mainNamespace\Controller\HelloWorldController:index');

$app->run();