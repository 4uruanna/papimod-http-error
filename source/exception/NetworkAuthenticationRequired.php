<?php

namespace Papimod\HttpError\exception;

class NetworkAuthenticationRequired extends PapiException
{
    protected $code = 511;
    protected $message = 'Network Authentication Required';
    protected string $title = '511 - Network Authentication Required';
    protected string $description = '';
}
