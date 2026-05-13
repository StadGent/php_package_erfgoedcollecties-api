<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Concept;

use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to get a Concept by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Concept
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
        $this->uri = sprintf('concepts/by-identifier?%s', http_build_query([
            'identifier' => $identifier,
        ]));
    }
}
