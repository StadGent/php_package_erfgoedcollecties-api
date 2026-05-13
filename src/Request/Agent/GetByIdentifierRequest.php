<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Request\Agent;

use DigipolisGent\API\Client\Request\AbstractJsonRequest;
use Gent\ErfgoedcollectiesApi\Uri\Agent\GetByIdentifierUri;

/**
 * Request to get an Agent by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Request\Agent
 */
final class GetByIdentifierRequest extends AbstractJsonRequest
{
    /**
     * Get an Agent by its external identifier.
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
