<?php

namespace Papimod\HttpError\exception;

class RequestEntityTooLargeException extends PapiException
{
    protected $code = 413;
    protected $message = 'Request Entity Too Large';
    protected string $title = '413 - Request Entity Too Large';
    protected string $description = '';
}
