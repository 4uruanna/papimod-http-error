<?php

namespace Papimod\HttpError\exception;

class UnsupportedMediaTypeException extends PapiException
{
    protected $code = 415;
    protected $message = 'Unsupported Media Type';
    protected string $title = '415 - Unsupported Media Type';
    protected string $description = '';
}
