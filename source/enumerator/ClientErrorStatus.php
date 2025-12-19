<?php

namespace Papimod\HttpError\enumerator;

use LengthException;
use Papimod\HttpError\exception\BadRequestException;
use Papimod\HttpError\exception\ConflictException;
use Papimod\HttpError\exception\ExpectationFailedException;
use Papimod\HttpError\exception\ForbiddenException;
use Papimod\HttpError\exception\GoneException;
use Papimod\HttpError\exception\MethodNotAllowedException;
use Papimod\HttpError\exception\NotAcceptableException;
use Papimod\HttpError\exception\NotFoundException;
use Papimod\HttpError\exception\PaymentRequiredException;
use Papimod\HttpError\exception\PreconditionFailedException;
use Papimod\HttpError\exception\PreconditionRequiredException;
use Papimod\HttpError\exception\ProxyAuthenticationRequiredException;
use Papimod\HttpError\exception\RequestedRangeNotSatisfiableException;
use Papimod\HttpError\exception\RequestEntityTooLargeException;
use Papimod\HttpError\exception\RequestHeaderFieldsTooLargeException;
use Papimod\HttpError\exception\RequestTimeoutException;
use Papimod\HttpError\exception\RequestUriTooLongException;
use Papimod\HttpError\exception\TeapotException;
use Papimod\HttpError\exception\TooManyRequestsException;
use Papimod\HttpError\exception\UnauthorizedException;
use Papimod\HttpError\exception\UnavailableForLegalReasonsException;
use Papimod\HttpError\exception\UnsupportedMediaTypeException;
use Papimod\HttpError\exception\UpgradeRequiredException;

enum ClientErrorStatus: string
{
    case BAD_REQUEST = BadRequestException::class;
    case UNAUTHORIZED = UnauthorizedException::class;
    case PAYMENT_REQUIRED = PaymentRequiredException::class;
    case FORBIDDEN = ForbiddenException::class;
    case NOT_FOUND = NotFoundException::class;
    case METHOD_NOT_ALLOWED = MethodNotAllowedException::class;
    case NOT_ACCEPTABLE = NotAcceptableException::class;
    case PROXY_AUTHENTICATION_REQUIRED = ProxyAuthenticationRequiredException::class;
    case REQUEST_TIMEOUT = RequestTimeoutException::class;
    case CONFLICT = ConflictException::class;
    case GONE = GoneException::class;
    case LENGTH_REQUIRED = LengthException::class;
    case PRECONDITION_FAILED = PreconditionFailedException::class;
    case REQUEST_ENTITY_TOO_LARGE = RequestEntityTooLargeException::class;
    case REQUEST_URI_TOO_LONG = RequestUriTooLongException::class;
    case UNSUPPORTED_MEDIA_TYPE = UnsupportedMediaTypeException::class;
    case REQUESTED_RANGE_NOT_SATISFIABLE = RequestedRangeNotSatisfiableException::class;
    case EXPECTATION_FAILED = ExpectationFailedException::class;
    case TEAPOT = TeapotException::class;
    case UPGRADE_REQUIRED = UpgradeRequiredException::class;
    case PRECONDITION_REQUIRED = PreconditionRequiredException::class;
    case TOO_MANY_REQUESTS = TooManyRequestsException::class;
    case REQUEST_HEADER_FIELDS_TOO_LARGE = RequestHeaderFieldsTooLargeException::class;
    case UNAVAILABLE_FOR_LEGAL_REASONS = UnavailableForLegalReasonsException::class;
}
