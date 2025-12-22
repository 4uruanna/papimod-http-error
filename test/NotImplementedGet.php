<?php

namespace Papimod\HttpError\Test;

use Papi\abstract\PapiGet;
use Papimod\HttpError\exception\NotImplementedException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class NotImplementedGet extends PapiGet
{
    public static function getPattern(): string
    {
        return "/notImplemented";
    }

    public function __invoke(Request $request, Response $response): Response
    {
        throw new NotImplementedException($request);
    }
}
