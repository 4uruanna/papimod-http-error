<?php

namespace Papimod\HttpError\exception;

class UnavailableForLegalReasonsException extends PapiException
{
    protected $code = 451;
    protected $message = 'Unavailable For Legal Reasons';
    protected string $title = '451 - Unavailable For Legal Reasons';
    protected string $description = '';
}
