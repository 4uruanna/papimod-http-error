<?php

namespace Papimod\HttpError\Test;

use Papi\enumerator\HttpMethod;
use Papi\PapiBuilder;
use Papi\Test\mock\FooGet;
use Papi\Test\PapiTestCase;
use Papimod\Dotenv\DotEnvModule;
use Papimod\HttpError\HttpErrorHandler;
use Papimod\HttpError\HttpErrorModel;
use Papimod\HttpError\HttpErrorModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(HttpErrorModule::class)]
#[Small]
final class HttpErrorModuleTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("ENVIRONMENT_DIRECTORY") || define("ENVIRONMENT_DIRECTORY", __DIR__);
        defined("ENVIRONMENT_FILE") || define("ENVIRONMENT_FILE", ".test.env");
        $this->builder = new PapiBuilder();
    }

    public function testFooApiCall(): void
    {
        $request = $this->createRequest(HttpMethod::GET, '/');
        $response = $this->builder
            ->addModule(
                DotEnvModule::class,
                HttpErrorModule::class
            )
            ->addAction(FooGet::class)
            ->build()
            ->handle($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    public function testNotFound(): void
    {
        $request = $this->createRequest(HttpMethod::GET, '/notFoundEndpoint');
        $response = $this->builder
            ->addModule(
                DotEnvModule::class,
                HttpErrorModule::class
            )
            ->build()
            ->handle($request);

        /** @var HttpErrorModel */
        $error = json_decode((string) $response->getBody());
        $this->assertSame(404, $error->code);
        $this->assertStringContainsString(HttpErrorHandler::RESOURCE_NOT_FOUND, $error->error);
    }
}
