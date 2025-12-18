<?php

namespace Papimod\HttpError\exception;

class RequestUriTooLongException extends PapiException
{
    protected $code = 414;
    protected $message = 'Request-URI Too Long';
    protected string $title = '414 - Request-URI Too Long';
    protected string $description = '';
}
