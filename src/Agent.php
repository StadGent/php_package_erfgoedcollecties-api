<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi;

use DigipolisGent\API\Client\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Gent\ErfgoedcollectiesApi\Handler\Agent\GetByIdentifierHandler;
use Gent\ErfgoedcollectiesApi\Handler\Agent\GetPagedHandler;
use Gent\ErfgoedcollectiesApi\Service\Agent\AgentService;
use Gent\ErfgoedcollectiesApi\Service\Agent\AgentServiceInterface;

/**
 * Factory to create the AgentService.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class Agent
{
    /**
     * Expects a Client object.
     *
     * Will add the package handlers and inject the client and optional cache
     * into the AgentService.
     *
     * @param \DigipolisGent\API\Client\ClientInterface $client
     * @param \Psr\SimpleCache\CacheInterface|null $cache
     *
     * @return \Gent\ErfgoedcollectiesApi\Service\Agent\AgentServiceInterface
     */
    public static function create(ClientInterface $client, ?CacheInterface $cache = null): AgentServiceInterface
    {
        $client->addHandler(new GetPagedHandler());
        $client->addHandler(new GetByIdentifierHandler());

        $service = new AgentService($client);
        if ($cache) {
            $service->setCacheService($cache);
        }

        return $service;
    }
}
