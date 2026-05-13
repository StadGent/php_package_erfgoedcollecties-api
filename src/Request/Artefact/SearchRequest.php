<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Request\Artefact;

use DigipolisGent\API\Client\Request\AbstractJsonRequest;
use Gent\ErfgoedcollectiesApi\Uri\Artefact\SearchUri;

/**
 * Request to search Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Request\Artefact
 */
final class SearchRequest extends AbstractJsonRequest
{
    /**
     * Search Artefacts.
     *
     * @param string $query
     *   The search query.
     * @param int $page
     *   The page number (1-based).
     * @param int $pageSize
     *   The page size (default 100).
     */
    public function __construct(string $query, int $page = 1, int $pageSize = 100)
    {
        $uri = new SearchUri($query, $page, $pageSize);
        parent::__construct($uri);
    }
}
