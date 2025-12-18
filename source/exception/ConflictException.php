<?php

namespace Papimod\HttpError\exception;

class ConflictException extends PapiException
{
    protected $code = 409;
    protected $message = 'Conflict';
    protected string $title = '409 - Conflict';
    protected string $description = '';
}
