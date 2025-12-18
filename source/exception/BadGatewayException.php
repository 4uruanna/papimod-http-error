<?php

namespace Papimod\HttpError\exception;

class BadGatewayException extends PapiException
{
    protected $code = 502;
    protected $message = 'Bad Gateway';
    protected string $title = '502 - Bad Gateway';
    protected string $description = '';
}
