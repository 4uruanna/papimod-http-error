<?php

namespace Papimod\HttpError\exception;

class PreconditionFailedException extends PapiException
{
    protected $code = 412;
    protected $message = 'Precondition Failed';
    protected string $title = '412 - Precondition Failed';
    protected string $description = '';
}
