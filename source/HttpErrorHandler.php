<?php

namespace Papimod\HttpError;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpException;
use Slim\Handlers\ErrorHandler;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpForbiddenException;
use Slim\Exception\HttpMethodNotAllowedException;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpNotImplementedException;
use Slim\Exception\HttpUnauthorizedException;
use Throwable;

final class HttpErrorHandler extends ErrorHandler
{
    public const BAD_REQUEST = 'BAD_REQUEST';
    public const INSUFFICIENT_PRIVILEGES = 'INSUFFICIENT_PRIVILEGES';
    public const NOT_ALLOWED = 'NOT_ALLOWED';
    public const NOT_IMPLEMENTED = 'NOT_IMPLEMENTED';
    public const RESOURCE_NOT_FOUND = 'RESOURCE_NOT_FOUND';
    public const SERVER_INTERNAL_ERROR = 'SERVER_INTERNAL_ERROR';
    public const UNAUTHENTICATED = 'UNAUTHENTICATED';

    public const HTTP_EXCEPTIONS = [
        HttpNotFoundException::class => self::RESOURCE_NOT_FOUND,
        HttpMethodNotAllowedException::class => self::NOT_ALLOWED,
        HttpUnauthorizedException::class => self::UNAUTHENTICATED,
        HttpForbiddenException::class => self::INSUFFICIENT_PRIVILEGES,
        HttpBadRequestException::class => self::BAD_REQUEST,
        HttpNotImplementedException::class => self::NOT_IMPLEMENTED,
    ];

    protected function respond(): ResponseInterface
    {
        $payload = new HttpErrorModel();
        $exception = $this->exception;

        if ($exception instanceof HttpException) {
            $payload->code = $exception->getCode();

            foreach (HttpErrorHandler::HTTP_EXCEPTIONS as $class => $error) {
                if ($exception instanceof $class) {
                    $payload->error = $error;
                    break;
                }
            }
        } else {
            if (($exception instanceof Exception || $exception instanceof Throwable) && $this->displayErrorDetails) {
                $payload->data["message"] = $exception->getMessage();
            }
        }

        $body = json_encode($payload, JSON_PRETTY_PRINT);
        $response = $this->responseFactory->createResponse($payload->code);
        $response->getBody()->write($body);
        return $response;
    }
}
