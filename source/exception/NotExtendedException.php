<?php

namespace Papimod\HttpError\exception;

class NotExtendedException extends PapiException
{
    protected $code = 510;
    protected $message = 'Not Extended';
    protected string $title = '510 - Not Extended';
    protected string $description = '';
}
