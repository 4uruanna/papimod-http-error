<?php

namespace Papimod\HttpError\exception;

use Slim\Exception\HttpSpecializedException;

abstract class PapiException extends HttpSpecializedException
{
    protected ?array $data = null;

    public function getData(): ?array
    {
        return $this->data;
    }
}
