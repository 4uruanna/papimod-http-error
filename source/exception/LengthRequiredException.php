<?php

namespace Papimod\HttpError\exception;

class LengthRequiredException extends PapiException
{
    protected $code = 411;
    protected $message = 'Length Required';
    protected string $title = '411 - Length Required';
    protected string $description = '';
}
