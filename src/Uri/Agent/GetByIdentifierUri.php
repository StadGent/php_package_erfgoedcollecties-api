<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Agent;

use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to get an Agent by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Agent
 */
final class GetByIdentifierUri extends BaseUri
{
    /**
     * Construct the URI.
     *
     * @param string $identifier
     *   The external identifier.
     */
    public function __construct(string $identifier)
    {
        $this->uri = sprintf('agents/by-identifier?%s', http_build_query([
            'identifier' => $identifier,
        ]));
    }
}
