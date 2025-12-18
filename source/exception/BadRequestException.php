<?php

namespace Papimod\HttpError\exception;

class BadRequestException extends PapiException
{
    protected $code = 400;
    protected $message = 'Bad Request';
    protected string $title = '400 - Bad Request';
    protected string $description = '';
}
