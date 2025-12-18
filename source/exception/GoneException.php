<?php

namespace Papimod\HttpError\exception;

class GoneException extends PapiException
{
    protected $code = 410;
    protected $message = 'Gone';
    protected string $title = '410 - Gone';
    protected string $description = '';
}
