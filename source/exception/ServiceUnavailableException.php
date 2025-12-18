<?php

namespace Papimod\HttpError\exception;

class ServiceUnavailableException extends PapiException
{
    protected $code = 503;
    protected $message = 'Service Unavailable';
    protected string $title = '503 - Service Unavailable';
    protected string $description = '';
}
