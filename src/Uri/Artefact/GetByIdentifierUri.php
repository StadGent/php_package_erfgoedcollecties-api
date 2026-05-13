<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Artefact;

use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to get an Artefact by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Artefact
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
        $this->uri = sprintf('artefacts/by-identifier?%s', http_build_query([
            'identifier' => $identifier,
        ]));
    }
}
