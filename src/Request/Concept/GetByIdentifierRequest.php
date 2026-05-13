<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Request\Concept;

use DigipolisGent\API\Client\Request\AbstractJsonRequest;
use Gent\ErfgoedcollectiesApi\Uri\Concept\GetByIdentifierUri;

/**
 * Request to get a Concept by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Request\Concept
 */
final class GetByIdentifierRequest extends AbstractJsonRequest
{
    /**
     * Get a Concept by its external identifier.
     *
     * @param string $identifier
     *   The external identifier.
     */
    public function __construct(string $identifier)
    {
        $uri = new GetByIdentifierUri($identifier);
        parent::__construct($uri);
    }
}
