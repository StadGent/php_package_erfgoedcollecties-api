<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Agent;

use DateTimeInterface;
use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\API\Service\ServiceInterface;
use Gent\ErfgoedcollectiesApi\Value\Agent;
use Gent\ErfgoedcollectiesApi\Value\AgentsResponse as AgentsResponseValue;

/**
 * Service to access the Agent related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
interface AgentServiceInterface extends ServiceInterface, LoggableInterface, CacheableInterface
{
    /**
     * Get paginated agents.
     *
     * @param int $page
     *   The page number.
     * @param int $pageSize
     *   The number of items per page.
     * @param \DateTimeInterface|null $modifiedSince
     *   Only return agents modified since this date.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AgentsResponse
     *
     * @throws \Gent\ErfgoedcollectiesApi\Exception\UnexpectedResponseException
     */
    public function getPaged(int $page = 1, int $pageSize = 100, ?DateTimeInterface $modifiedSince = null): AgentsResponseValue;

    /**
     * Get a single Agent by its external identifier.
     *
     * @param string $identifier
     *   The external identifier.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Agent
     *
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Gent\ErfgoedcollectiesApi\Exception\NotFoundException
     */
    public function getByIdentifier(string $identifier): Agent;
}
