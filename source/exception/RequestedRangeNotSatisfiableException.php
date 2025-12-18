<?php

namespace Papimod\HttpError\exception;

class RequestedRangeNotSatisfiableException extends PapiException
{
    protected $code = 416;
    protected $message = 'Requested Range Not Satisfiable';
    protected string $title = '416 - Requested Range Not Satisfiable';
    protected string $description = '';
}
