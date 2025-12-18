<?php

namespace Papimod\HttpError\exception;

class GatewayTimeoutException extends PapiException
{
    protected $code = 504;
    protected $message = 'Gateway Timeout';
    protected string $title = '504 - Gateway Timeout';
    protected string $description = '';
}
