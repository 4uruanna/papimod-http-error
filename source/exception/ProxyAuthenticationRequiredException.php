<?php

namespace Papimod\HttpError\exception;

class ProxyAuthenticationRequiredException extends PapiException
{
    protected $code = 407;
    protected $message = 'Proxy Authentication Required';
    protected string $title = '407 - Proxy Authentication Required';
    protected string $description = '';
}
