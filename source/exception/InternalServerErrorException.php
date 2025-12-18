<?php

namespace Papimod\HttpError\exception;

class InternalServerErrorException extends PapiException
{
    protected $code = 500;
    protected $message = 'Internal Server Error';
    protected string $title = '500 - Internal Server Error';
    protected string $description = '';
}
