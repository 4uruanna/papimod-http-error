# HTTP Error Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Help integrate error and warning handling into your [papi](https://github.com/4uruanna/papi).

This module is based on the [official tutorial](https://www.slimframework.com/docs/v4/objects/application.html#advanced-notices-and-warnings-handling).

## Prerequisites Modules

- [Dotenv](https://github.com/4uruanna/papimod-dotenv)

## Configuration

### `ENVIRONMENT` (.ENV)

|               |                                                       |
|-:             |:-                                                     |
|Required       | No                                                    |
|Type           | `PRODUCTION`, `DEVELOPMENT`, `TEST` or `null`         |
|Description    | Display error details when is not set to `PRODUCTION` |
|Default        | `null`                                                |

### `DISABLE_BODY_PARSING_MIDDLEWARE` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | `0`, `1`                                          |
|Description    | Disable the built-in body parsing middleware      |
|Default        | `0`                                               |

### `DISABLE_ROUTING_MIDDLEWARE` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | `0`, `1`                                          |
|Description    | Disable the built-in routing middleware           |
|Default        | `0`                                               |

