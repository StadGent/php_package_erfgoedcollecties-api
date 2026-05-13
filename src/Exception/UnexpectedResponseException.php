<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Exception;

use Exception;

/**
 * Exception thrown when a response is not of the expected type.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
class UnexpectedResponseException extends Exception
{
    /**
     * Create exception from response class.
     *
     * @param string $actualClass
     *   The actual response class.
     * @param string $expectedClass
     *   The expected response class.
     *
     * @return self
     */
    public static function fromClass(string $actualClass, string $expectedClass): self
    {
        return new self(
            sprintf(
                'Expected response of type "%s", got "%s".',
                $expectedClass,
                $actualClass
            )
        );
    }
}
