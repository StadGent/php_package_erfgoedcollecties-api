<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Request\Artefact;

use DigipolisGent\API\Client\Request\AbstractJsonRequest;
use Gent\ErfgoedcollectiesApi\Uri\Artefact\GetByIdentifierUri;

/**
 * Request to get an Artefact by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Request\Artefact
 */
final class GetByIdentifierRequest extends AbstractJsonRequest
{
    /**
     * Get an Artefact by its external identifier.
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
