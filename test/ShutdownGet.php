<?php

namespace Papimod\HttpError\Test;

use Papi\abstract\PapiGet;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class ShutdownGet extends PapiGet
{
    public static function getPattern(): string
    {
        return '/shutdown';
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $b = $a;
    }
}
