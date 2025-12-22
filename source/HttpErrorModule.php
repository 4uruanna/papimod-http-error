<?php

namespace Papimod\HttpError;

use Papi\PapiModule;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Common\CommonModule;

final class HttpErrorModule extends PapiModule
{
    public static function getPrerequisites(): array
    {
        return [
            DotEnvModule::class,
            CommonModule::class
        ];
    }

    public static function getMiddlewares(): array
    {
        return [
            HttpErrorMiddleware::class,
            HttpShutdownMiddleware::class
        ];
    }

    public static function configure(): void
    {
        ini_set('display_errors', '0');
        ini_set('display_startup_errors', '0');
        error_reporting();
    }
}
