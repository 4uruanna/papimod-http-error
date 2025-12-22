<?php

namespace Papimod\HttpError;

use Exception;
use Papimod\HttpError\exception\PapiException;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpException;
use Slim\Handlers\ErrorHandler;
use Throwable;

final class HttpErrorHandler extends ErrorHandler
{
    protected function respond(): ResponseInterface
    {
        $payload = [];

        if ($this->exception instanceof HttpException) {
            $payload = [
                "code" => $this->exception->getCode(),
                "message" => $this->exception->getMessage()
            ];

            if ($this->exception instanceof PapiException) {
                $payload["data"] = $this->exception->getData();
            }
        } else {
            $payload["code"] = 500;

            if (
                ($this->exception instanceof Exception || $this->exception instanceof Throwable)
                && $this->displayErrorDetails
            ) {
                $payload["message"] = $this->exception->getMessage();
            } else {
                $payload["message"] = "Not Implemented";
            }
        }

        if ($this->displayErrorDetails) {
            $payload["trace"] = $this->exception->getTraceAsString();
        }

        $response = $this->responseFactory
            ->createResponse($payload["code"])
            ->withHeader("Content-Type", "application/json");

        $response
            ->getBody()
            ->write(json_encode($payload, JSON_PRETTY_PRINT));

        return $response;
    }
}
