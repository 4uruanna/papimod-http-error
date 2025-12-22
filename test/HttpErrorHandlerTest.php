<?php

namespace Papimod\HttpError\Test;

use Papi\enumerator\HttpMethod;
use Papi\PapiBuilder;
use Papi\Test\PapiTestCase;
use Papimod\HttpError\HttpErrorHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use Papimod\Common\CommonModule;
use Papimod\Dotenv\DotEnvModule;
use Papimod\HttpError\HttpErrorModule;

#[CoversClass(HttpErrorHandler::class)]
final class HttpErrorHandlerTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("PAPI_DOTENV_DIRECTORY") || define("PAPI_DOTENV_DIRECTORY", __DIR__);
        defined("PAPI_DOTENV_FILE") || define("PAPI_DOTENV_FILE", ".test.env");
        $this->builder = new PapiBuilder();
    }

    public function testNotFound(): void
    {
        $request = $this->createRequest(HttpMethod::GET, '/notFoundEndpoint');
        $response = $this->builder
            ->addModule(
                DotEnvModule::class,
                CommonModule::class,
                HttpErrorModule::class
            )
            ->build()
            ->handle($request);

        $error = json_decode((string) $response->getBody());
        $this->assertSame(404, $error->code);
    }

    public function testNotImplemented(): void
    {
        $request = $this->createRequest(HttpMethod::GET, '/notImplemented');
        $response = $this->builder
            ->addModule(
                DotEnvModule::class,
                CommonModule::class,
                HttpErrorModule::class
            )
            ->addAction(NotImplementedGet::class)
            ->build()
            ->handle($request);

        $error = json_decode((string) $response->getBody());
        $this->assertSame(501, $error->code);
    }
}
