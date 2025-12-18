<?php

namespace Papimod\HttpError\exception;

class TooManyRequestsException extends PapiException
{
    protected $code = 426;
    protected $message = 'Too Many Requests';
    protected string $title = '426 - Too Many Requests';
    protected string $description = '';
}
