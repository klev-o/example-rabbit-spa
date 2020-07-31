<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;
use Slim\App;
use Slim\Container;
use Symfony\Component\Dotenv\Dotenv;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

if (file_exists('.env')) {
    (new Dotenv())->load('.env');
}

$config = require 'config/config.php';
$container = new Container($config);
$app = new App($container);

$app->get('/', HomeAction::class . ':handle');


$app->run();