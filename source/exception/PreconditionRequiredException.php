<?php

namespace Papimod\HttpError\exception;

class PreconditionRequiredException extends PapiException
{
    protected $code = 428;
    protected $message = 'Precondition Required';
    protected string $title = '428 - Precondition Required';
    protected string $description = '';
}
