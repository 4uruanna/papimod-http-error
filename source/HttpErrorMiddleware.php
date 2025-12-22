<?php

namespace Papimod\HttpError;

use Papi\interface\PapiMiddleware;
use Papimod\Dotenv\Environment;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;

final class HttpErrorMiddleware implements PapiMiddleware
{
    public static function register(App $app, array &$middlewares_map): bool
    {
        $result = false;

        if (isset($middlewares_map[HttpShutdownMiddleware::class])) {
            $error_handler = HttpShutdownMiddleware::getErrorHandler($app);
            $errorMiddleware = $app->addErrorMiddleware(ENVIRONMENT !== Environment::PRODUCTION, false, true);
            $errorMiddleware->setDefaultErrorHandler($error_handler);
            $result = true;
        }

        return $result;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}
