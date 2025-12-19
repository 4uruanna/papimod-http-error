<?php

namespace Papimod\HttpError\enumerator;

use Papimod\HttpError\exception\BadGatewayException;
use Papimod\HttpError\exception\GatewayTimeoutException;
use Papimod\HttpError\exception\HttpVersionNotSupportedException;
use Papimod\HttpError\exception\InternalServerErrorException;
use Papimod\HttpError\exception\NetworkAuthenticationRequired;
use Papimod\HttpError\exception\NotExtendedException;
use Papimod\HttpError\exception\NotImplementedException;
use Papimod\HttpError\exception\ServiceUnavailableException;

enum ServerErrorStatus: string
{
    case INTERNAL_SERVER_ERROR = InternalServerErrorException::class;
    case NOT_IMPLEMENTED = NotImplementedException::class;
    case BAD_GATEWAY = BadGatewayException::class;
    case SERVICE_UNAVAILABLE = ServiceUnavailableException::class;
    case GATEWAY_TIMEOUT = GatewayTimeoutException::class;
    case HTTP_VERSION_NOT_SUPPORTED = HttpVersionNotSupportedException::class;
    case NOT_EXTENDED = NotExtendedException::class;
    case NETWORK_AUTHENTICATION_REQUIRED = NetworkAuthenticationRequired::class;
}
