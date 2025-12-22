<?php

namespace Papimod\HttpError\Test;

use Papi\enumerator\HttpMethod;
use Papi\PapiBuilder;
use Papi\Test\PapiTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Papimod\Common\CommonModule;
use Papimod\Dotenv\DotEnvModule;
use Papimod\HttpError\HttpErrorModule;
use Papimod\HttpError\HttpShutdownHandler;

#[CoversClass(HttpShutdownHandler::class)]
final class HttpShutdownHandlerTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("PAPI_DOTENV_DIRECTORY") || define("PAPI_DOTENV_DIRECTORY", __DIR__);
        defined("PAPI_DOTENV_FILE") || define("PAPI_DOTENV_FILE", ".test.env");
        $this->builder = new PapiBuilder();
    }

    public function testShutdownException(): void
    {
        $request = $this->createRequest(HttpMethod::GET, '/shutdown');
        $response = $this->builder
            ->addModule(
                DotEnvModule::class,
                CommonModule::class,
                HttpErrorModule::class
            )
            ->addAction(ShutdownGet::class)
            ->build()
            ->handle($request);

        $error = json_decode((string) $response->getBody());
        $this->assertSame(500, $error->code);
        $this->assertSame("Not Implemented", $error->message);
    }
}
