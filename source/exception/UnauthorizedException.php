<?php

namespace Papimod\HttpError\exception;

class UnauthorizedException extends PapiException
{
    protected $code = 401;
    protected $message = 'Unauthorized';
    protected string $title = '401 - Unauthorized';
    protected string $description = '';
}
