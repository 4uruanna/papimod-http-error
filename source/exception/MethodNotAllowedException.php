<?php

namespace Papimod\HttpError\exception;

class MethodNotAllowedException extends PapiException
{
    protected $code = 405;
    protected $message = 'Method Not Allowed';
    protected string $title = '405 - Method Not Allowed';
    protected string $description = '';
}
