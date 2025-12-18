<?php

namespace Papimod\HttpError\exception;

class ExpectationFailedException extends PapiException
{
    protected $code = 417;
    protected $message = 'Expectation Failed';
    protected string $title = '417 - Expectation Failed';
    protected string $description = '';
}
