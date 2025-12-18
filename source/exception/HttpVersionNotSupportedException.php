<?php

namespace Papimod\HttpError\exception;

class HttpVersionNotSupportedException extends PapiException
{
    protected $code = 505;
    protected $message = 'HTTP Version Not Supported';
    protected string $title = '505 - HTTP Version Not Supported';
    protected string $description = '';
}
