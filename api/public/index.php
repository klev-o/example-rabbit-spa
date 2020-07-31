<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;
use Slim\App;
use Slim\Container;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$config = require 'config/config.php';
$container = new Container($config);
$app = new App($container);

$app->get('/', HomeAction::class);


$app->run();