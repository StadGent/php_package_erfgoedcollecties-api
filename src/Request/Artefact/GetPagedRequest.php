<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Request\Artefact;

use DateTimeInterface;
use DigipolisGent\API\Client\Request\AbstractJsonRequest;
use Gent\ErfgoedcollectiesApi\Uri\Artefact\GetPagedUri;

/**
 * Request to get a paginated list of Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Request\Artefact
 */
final class GetPagedRequest extends AbstractJsonRequest
{
    /**
     * Get a paginated list of Artefacts.
     *
     * @param int $page
     *   The page number (1-based).
     * @param int $pageSize
     *   The page size (default 100).
     * @param \DateTimeInterface|null $modifiedSince
     *   Optional modified since filter.
     */
    public function __construct(int $page = 1, int $pageSize = 100, ?DateTimeInterface $modifiedSince = null)
    {
        $uri = new GetPagedUri($page, $pageSize, $modifiedSince);
        parent::__construct($uri);
    }
}
