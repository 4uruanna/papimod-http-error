<?php

namespace Papimod\HttpError;

use Slim\Exception\HttpInternalServerErrorException;
use Slim\Psr7\Request;
use Slim\ResponseEmitter;

class HttpShutdownHandler
{
    private readonly Request $request;

    private readonly HttpErrorHandler $error_handler;

    private readonly bool $display_error_details;

    /**
     * ShutdownHandler constructor.
     *
     * @param Request           $request
     * @param HttpErrorHandler  $error_handler
     * @param bool              $display_error_details
     */
    public function __construct(Request $request, HttpErrorHandler $error_handler, bool $display_error_details)
    {
        $this->request = $request;
        $this->error_handler = $error_handler;
        $this->display_error_details = $display_error_details;
    }

    public function __invoke(): void
    {
        $response_emitter = new ResponseEmitter();
        $error = error_get_last();

        if ($error) {
            $message = "[ERROR]";

            if ($this->display_error_details) {
                switch ($error["type"]) {
                    case E_USER_ERROR:
                        $message = "[FATAL ERROR] "
                            . $error["message"]
                            . ". on line "
                            . $error["line"]
                            . " in file "
                            . $error["file"];
                        break;

                    case E_USER_WARNING:
                        $message = "[WARNING] " . $error["message"];
                        break;

                    case E_USER_NOTICE:
                        $message = "[NOTICE] " . $error["message"];
                        break;

                    default:
                        $message = "[UNKNOWN ERROR] "
                            . $error["message"]
                            . ". on line "
                            . $error["line"]
                            . " in file "
                            . $error["file"];
                        break;
                }
            }

            $exception = new HttpInternalServerErrorException($this->request, $message);

            $response = $this->error_handler->__invoke(
                $this->request,
                $exception,
                $this->display_error_details,
                false,
                false
            );

            if (ob_get_length()) {
                ob_clean();
            }

            $response_emitter->emit($response);
        }
    }
}
