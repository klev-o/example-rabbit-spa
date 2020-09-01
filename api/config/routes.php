<?php

declare(strict_types=1);

use Api\Http\Action;
use Api\Http\Middleware;
use Api\Infrastructure\Framework\Middleware\CallableMiddlewareAdapter as CM;
use League\OAuth2\Server\Middleware\ResourceServerMiddleware;
use Psr\Container\ContainerInterface;
use Slim\App;

return function (App $app, ContainerInterface $container) {

    $app->add(new CM($container, Middleware\BodyParamsMiddleware::class));
    $app->add(new CM($container, Middleware\DomainExceptionMiddleware::class));
    $app->add(new CM($container, Middleware\ValidationExceptionMiddleware::class));

    $app->get('/', Action\HomeAction::class . ':handle');
    $app->post('/auth/signup', Action\Auth\SignUp\RequestAction::class . ':handle');
    $app->post('/auth/signup/confirm', Action\Auth\SignUp\ConfirmAction::class . ':handle');
    $app->post('/oauth/auth', Action\Auth\OAuthAction::class . ':handle');

    $auth = $container->get(ResourceServerMiddleware::class);
    $app->group('/profile', function () {
        $this->get('', Action\Profile\ShowAction::class . ':handle');
    })->add($auth);

    $app->group('/author', function () {
        $this->get('', Action\Author\ShowAction::class . ':handle');
    })->add($auth);


};