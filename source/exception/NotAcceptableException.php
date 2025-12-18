<?php

namespace Papimod\HttpError\exception;

class NotAcceptableException extends PapiException
{
    protected $code = 406;
    protected $message = 'Not Acceptable';
    protected string $title = '406 - Not Acceptable';
    protected string $description = '';
}
