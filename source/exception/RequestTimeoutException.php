<?php

namespace Papimod\HttpError\exception;

class RequestTimeoutException extends PapiException
{
    protected $code = 408;
    protected $message = 'Request Timeout';
    protected string $title = '408 - Request Timeout';
    protected string $description = '';
}
