<?php

namespace Papimod\HttpError\exception;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpSpecializedException;
use Throwable;

abstract class PapiException extends HttpSpecializedException
{
    protected ?array $data = null;

    public function __construct(ServerRequestInterface $request)
    {
        return parent::__construct($request);
    }

    public function getData(): ?array
    {
        return $this->data;
    }
}
