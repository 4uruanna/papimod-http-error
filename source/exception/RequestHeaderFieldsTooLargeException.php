<?php

namespace Papimod\HttpError\exception;

class RequestHeaderFieldsTooLargeException extends PapiException
{
    protected $code = 431;
    protected $message = 'Request Header Fields Too Large';
    protected string $title = '431 - Request Header Fields Too Large';
    protected string $description = '';
}
