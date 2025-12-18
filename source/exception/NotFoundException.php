<?php

namespace Papimod\HttpError\exception;

class NotFoundException extends PapiException
{
    protected $code = 404;
    protected $message = 'Not Found';
    protected string $title = '404 - Not Found';
    protected string $description = '';
}
