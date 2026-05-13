<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi;

use DigipolisGent\API\Client\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Gent\ErfgoedcollectiesApi\Handler\Concept\GetByIdentifierHandler;
use Gent\ErfgoedcollectiesApi\Handler\Concept\GetPagedHandler;
use Gent\ErfgoedcollectiesApi\Service\Concept\ConceptService;
use Gent\ErfgoedcollectiesApi\Service\Concept\ConceptServiceInterface;

/**
 * Factory to create the ConceptService.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class Concept
{
    /**
     * Expects a Client object.
     *
     * Will add the package handlers and inject the client and optional cache
     * into the ConceptService.
     *
     * @param \DigipolisGent\API\Client\ClientInterface $client
     * @param \Psr\SimpleCache\CacheInterface|null $cache
     *
     * @return \Gent\ErfgoedcollectiesApi\Service\Concept\ConceptServiceInterface
     */
    public static function create(ClientInterface $client, ?CacheInterface $cache = null): ConceptServiceInterface
    {
        $client->addHandler(new GetPagedHandler());
        $client->addHandler(new GetByIdentifierHandler());

        $service = new ConceptService($client);
        if ($cache) {
            $service->setCacheService($cache);
        }

        return $service;
    }
}
