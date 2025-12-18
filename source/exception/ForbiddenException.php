<?php

namespace Papimod\HttpError\exception;

class ForbiddenException extends PapiException
{
    protected $code = 403;
    protected $message = 'Forbidden';
    protected string $title = '403 - Forbidden';
    protected string $description = '';
}
