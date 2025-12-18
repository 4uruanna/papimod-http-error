<?php

namespace Papimod\HttpError\exception;

class PaymentRequiredException extends PapiException
{
    protected $code = 402;
    protected $message = 'Payment Required';
    protected string $title = '402 - Payment Required';
    protected string $description = '';
}
