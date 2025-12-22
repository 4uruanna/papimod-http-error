<?php

namespace Papimod\HttpError;

use Papi\interface\PapiMiddleware;
use Papimod\Common\middleware\BodyParsingMiddleware;
use Papimod\Common\middleware\RoutingMiddleware;
use Papimod\Dotenv\Environment;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use Slim\Factory\ServerRequestCreatorFactory;

final class HttpShutdownMiddleware implements PapiMiddleware
{
    private static HttpErrorHandler $error_handler;

    private static bool $registered = false;

    public static function getErrorHandler(App $app): HttpErrorHandler
    {
        if (isset(self::$error_handler) === false) {
            $callable_resolver = $app->getCallableResolver();
            $response_factory = $app->getResponseFactory();
            self::$error_handler = new HttpErrorHandler($callable_resolver, $response_factory);
        }

        return self::$error_handler;
    }


    public static function register(App $app, array &$middlewares_map): bool
    {
        $result = false;

        if (isset($middlewares_map[RoutingMiddleware::class]) && isset($middlewares_map[BodyParsingMiddleware::class])) {
            $factory = ServerRequestCreatorFactory::create();
            $request = $factory->createServerRequestFromGlobals();
            $error_handler = self::getErrorHandler($app);
            $shutdown_handler = new HttpShutdownHandler($request, $error_handler, ENVIRONMENT !== Environment::PRODUCTION);

            if (self::$registered === false) {
                register_shutdown_function($shutdown_handler);
                self::$registered = true;
            }

            $result = true;
        }

        return $result;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}
