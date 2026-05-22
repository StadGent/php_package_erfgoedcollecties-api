<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Artefact;

use DateTimeInterface;
use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\API\Service\ServiceInterface;
use Gent\ErfgoedcollectiesApi\Value\Artefact;
use Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse as ArtefactsResponseValue;

/**
 * Service to access the Artefact related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
interface ArtefactServiceInterface extends ServiceInterface, LoggableInterface, CacheableInterface
{
    /**
     * Get paginated artefacts.
     *
     * @param int $page
     *   The page number.
     * @param int $pageSize
     *   The number of items per page.
     * @param \DateTimeInterface|null $modifiedSince
     *   Only return artefacts modified since this date.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse
     *
     * @throws \Gent\ErfgoedcollectiesApi\Exception\UnexpectedResponseException
     */
    public function getPaged(int $page = 1, int $pageSize = 100, ?DateTimeInterface $modifiedSince = null): ArtefactsResponseValue;

    /**
     * Search artefacts by query.
     *
     * NOTE: The search results are never cached.
     *
     * @param string $query
     *   The search query.
     * @param int $page
     *   The page number.
     * @param int $pageSize
     *   The number of items per page.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse
     *
     * @throws \Gent\ErfgoedcollectiesApi\Exception\UnexpectedResponseException
     */
    public function search(string $query, int $page = 1, int $pageSize = 100): ArtefactsResponseValue;

    /**
     * Get a single Artefact by its external identifier.
     *
     * @param string $identifier
     *   The external identifier.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Artefact
     *
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Gent\ErfgoedcollectiesApi\Exception\NotFoundException
     */
    public function getByIdentifier(string $identifier): Artefact;
}
