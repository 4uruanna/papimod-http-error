<?php

namespace Papimod\HttpError;

class HttpErrorModel
{
    public int $code = 500;

    public string $error = "SERVER_INTERNAL_ERROR";

    public array $data = [];
}
