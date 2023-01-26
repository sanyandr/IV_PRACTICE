<?php

require_once realpath('../vendor/autoload.php');

use mainNamespace\Controller;

(new \mainNamespace\Controller\HelloWorldController())->exec();