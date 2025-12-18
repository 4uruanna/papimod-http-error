<?php

namespace Papimod\HttpError\exception;

class UpgradeRequiredException extends PapiException
{
    protected $code = 426;
    protected $message = 'Upgrade Required';
    protected string $title = '426 - Upgrade Required';
    protected string $description = '';
}
