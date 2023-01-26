<?php

require __DIR__ . '/../vendor/autoload.php';


use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

$app = AppFactory::create($container);

$app->addRoutingMiddleware();

use mainNamespace\Controller;

(new \mainNamespace\Controller\HelloWorldController())->exec();