<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Concept;

use DateTimeInterface;
use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\API\Service\ServiceInterface;
use Gent\ErfgoedcollectiesApi\Value\Concept;
use Gent\ErfgoedcollectiesApi\Value\ConceptsResponse as ConceptsResponseValue;

/**
 * Service to access the Concept related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
interface ConceptServiceInterface extends ServiceInterface, LoggableInterface, CacheableInterface
{
    /**
     * Get paginated concepts.
     *
     * @param int $page
     *   The page number.
     * @param int $pageSize
     *   The number of items per page.
     * @param \DateTimeInterface|null $modifiedSince
     *   Only return concepts modified since this date.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse
     *
     * @throws \Gent\ErfgoedcollectiesApi\Exception\UnexpectedResponseException
     */
    public function getPaged(int $page = 1, int $pageSize = 100, ?DateTimeInterface $modifiedSince = null): ConceptsResponseValue;

    /**
     * Get a single Concept by its external identifier.
     *
     * @param string $identifier
     *   The external identifier.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Concept
     *
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Gent\ErfgoedcollectiesApi\Exception\NotFoundException
     */
    public function getByIdentifier(string $identifier): Concept;
}
