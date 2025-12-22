# HTTP Error Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Help integrate error and warning handling into your [papi](https://github.com/4uruanna/papi).

This module is based on the [official tutorial](https://www.slimframework.com/docs/v4/objects/application.html#advanced-notices-and-warnings-handling).

    ⚠︎ We advise against modifying the configuration of the “common module

## Prerequisites Modules

- [Dotenv](https://github.com/4uruanna/papimod-dotenv)
- [Common](https://github.com/4uruanna/papimod-common)

## Configuration

### `ENVIRONMENT` (.ENV)

|               |                                                       |
|-:             |:-                                                     |
|Required       | No                                                    |
|Type           | `PRODUCTION`, `DEVELOPMENT`, `TEST` or `null`         |
|Description    | Display error details when is not set to `PRODUCTION` |
|Default        | `null`                                                |


## Usage

You can add the following options to your  `.env` file:

```Env
ENVIRONMENT=DEVELOPMENT
```

Import the module when creating your application:

```php
require __DIR__ . "/../vendor/autoload.php";

use Papi\PapiBuilder;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Common\CommonModule;
use Papimod\HttpError\HttpErrorModule;
use function DI\create;

$builder = new PapiBuilder();

$builder
    ->setModule(
        DotEnvModule::class, # Prerequisite
        CommonModule::class,
        HttpErrorModule::class
    )
    ->build()
    ->run();
```
Use one of the following [exceptions](./source/exception/) whenever you want:

```php
use Papi\abstract\PapiGet;
use Papimod\HttpError\exception\NotImplementedException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class NotImplementedGet extends PapiGet
{
    public static function getPattern(): string
    {
        return "/notImplemented";
    }

    public function __invoke(Request $request, Response $response): Response
    {
        throw new NotImplementedException($request);
    }
}
```
