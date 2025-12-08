<?php

namespace Papimod\HttpError;

use Papi\enumerator\EventPhases;
use Papi\Event;
use Slim\App;
use Slim\Factory\ServerRequestCreatorFactory;

final class HttpErrorMiddlewareEvent implements Event
{
    public static function getPhase(): string
    {
        return EventPhases::BEFORE_MIDDLEWARES;
    }

    public function __invoke(mixed ...$args): void
    {
        /** @var App */
        $app = $args[0];

        $is_not_production = isset($_SERVER["ENVIRONMENT"]) === false || $_SERVER["ENVIRONMENT"] !== "PRODUCTION";

        $callable_resolver = $app->getCallableResolver();
        $response_factory = $app->getResponseFactory();

        $request = ServerRequestCreatorFactory::create()->createServerRequestFromGlobals();

        $error_handler = new HttpErrorHandler($callable_resolver, $response_factory);
        $shutdown_handler = new HttpShutdownHandler($request, $error_handler, $is_not_production);
        register_shutdown_function($shutdown_handler);

        # Add Body Parsing Middleware

        if (DISABLE_BODY_PARSING_MIDDLEWARE === 0) {
            $app->addBodyParsingMiddleware();
        }

        # Add Routing Middleware

        if (DISABLE_ROUTING_MIDDLEWARE === 0) {
            $app->addRoutingMiddleware();
        }

        # Add Routing Middleware

        $errorMiddleware = $app->addErrorMiddleware($is_not_production, false, true);
        $errorMiddleware->setDefaultErrorHandler($error_handler);
    }
}
