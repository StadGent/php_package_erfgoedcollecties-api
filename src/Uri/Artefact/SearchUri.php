<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Artefact;

use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to search Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Artefact
 */
final class SearchUri extends BaseUri
{
    /**
     * Construct the URI.
     *
     * @param string $query
     *   The search query.
     * @param int $page
     *   The page number (default 1).
     * @param int $pageSize
     *   The page size (default 100).
     */
    public function __construct(
        string $query,
        int $page = 1,
        int $pageSize = 100
    ) {
        $this->uri = sprintf('artefacts/search?%s', http_build_query([
            'q' => $query,
            'page' => $page,
            'pageSize' => $pageSize,
        ]));
    }
}
