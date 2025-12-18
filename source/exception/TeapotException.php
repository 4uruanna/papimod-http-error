<?php

namespace Papimod\HttpError\exception;

class TeapotException extends PapiException
{
    protected $code = 418;
    protected $message = 'I’m a teapot';
    protected string $title = '418 - I’m a teapot';
    protected string $description = '';
}
