<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri;

use DigipolisGent\API\Client\Uri\UriInterface;

/**
 * Base request URI to be used to communicate with the server endpoint.
 */
abstract class BaseUri implements UriInterface
{
    /**
     * The URI string.
     *
     * @var string
     */
    protected string $uri;

    /**
     * Get the URI as string.
     *
     * @return string
     *   The URI.
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}
