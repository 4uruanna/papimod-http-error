<?php

namespace Papimod\HttpError\exception;

class NotImplementedException extends PapiException
{
    protected $code = 501;
    protected $message = 'Not Implemented';
    protected string $title = '501 - Not Implemented';
    protected string $description = '';
}
