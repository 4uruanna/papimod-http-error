<?php

namespace Papimod\HttpError;

use Papi\ApiModule;
use Papimod\Dotenv\DotEnvModule;

final class HttpErrorModule extends ApiModule
{
    public ?array $prerequisite_list = [DotEnvModule::class];

    public ?array $event_list = [HttpErrorMiddlewareEvent::class];

    public function configure(): void
    {
        if (defined("DISABLE_BODY_PARSING_MIDDLEWARE") === false) {
            define("DISABLE_BODY_PARSING_MIDDLEWARE", (int) ($_SERVER["DISABLE_BODY_PARSING_MIDDLEWARE"] ?? 0));
        }

        if (defined("DISABLE_ROUTING_MIDDLEWARE") === false) {
            define("DISABLE_ROUTING_MIDDLEWARE", (int) ($_SERVER["DISABLE_ROUTING_MIDDLEWARE"] ?? 0));
        }
    }
}
