<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Agent;

use DateTimeInterface;
use Exception;
use Gent\ErfgoedcollectiesApi\Exception\ExceptionFactory;
use Gent\ErfgoedcollectiesApi\Request\Agent\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Request\Agent\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Response\AgentResponse;
use Gent\ErfgoedcollectiesApi\Response\AgentsResponse;
use Gent\ErfgoedcollectiesApi\Service\ServiceAbstract;
use Gent\ErfgoedcollectiesApi\Value\Agent;
use Gent\ErfgoedcollectiesApi\Value\AgentsResponse as AgentsResponseValue;

/**
 * Service to access the Agent related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class AgentService extends ServiceAbstract implements AgentServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getPaged(int $page = 1, int $pageSize = 100, ?DateTimeInterface $modifiedSince = null): AgentsResponseValue
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'agents',
            'page',
            (string) $page,
            'size',
            (string) $pageSize,
            'modified',
            $modifiedSince ? $modifiedSince->format('c') : 'all',
        ]);

        // From cache?
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        // Get from service.
        /** @var \Gent\ErfgoedcollectiesApi\Response\AgentsResponse $response */
        $response = $this->send(
            new GetPagedRequest($page, $pageSize, $modifiedSince),
            AgentsResponse::class
        );

        $result = $response->getAgentsResponse();
        $this->cacheSet($cacheKey, $result);

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getByIdentifier(string $identifier): Agent
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'agent',
            'identifier',
            $identifier,
        ]);

        // From cache?
        $cached = $this->cacheGet($cacheKey);
        if ($cached) {
            return $cached;
        }

        try {
            // Get from service.
            /** @var \Gent\ErfgoedcollectiesApi\Response\AgentResponse $response */
            $response = $this->send(
                new GetByIdentifierRequest($identifier),
                AgentResponse::class
            );
        } catch (Exception $e) {
            throw ExceptionFactory::fromException($e);
        }

        $agent = $response->getAgent();
        $this->cacheSet($cacheKey, $agent);

        return $agent;
    }
}
