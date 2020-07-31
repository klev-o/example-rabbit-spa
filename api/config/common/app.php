<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;
use Api\Model;
use Psr\Container\ContainerInterface;

return [
    HomeAction::class => function () {
        return new HomeAction();
    },

    Action\Auth\SignUp\RequestAction::class => function (ContainerInterface $container) {
        return new Action\Auth\SignUp\RequestAction(
            $container->get( Model\User\UseCase\SignUp\Request\Handler::class)
        );
    }
];