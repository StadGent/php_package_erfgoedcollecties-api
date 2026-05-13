<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Exception;

use Exception;
use GuzzleHttp\Exception\RequestException;

/**
 * Factory to create exceptions from other exceptions.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
class ExceptionFactory
{
    /**
     * Create an exception from another exception.
     *
     * @param \Exception $exception
     *   The original exception.
     *
     * @return \Exception
     */
    public static function fromException(Exception $exception): Exception
    {
        if ($exception instanceof RequestException) {
            $response = $exception->getResponse();
            if ($response && $response->getStatusCode() === 404) {
                return new NotFoundException(
                    'Resource not found.',
                    404,
                    $exception
                );
            }
        }

        return $exception;
    }
}
