<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi;

use DigipolisGent\API\Client\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Gent\ErfgoedcollectiesApi\Handler\Artefact\GetByIdentifierHandler;
use Gent\ErfgoedcollectiesApi\Handler\Artefact\GetPagedHandler;
use Gent\ErfgoedcollectiesApi\Service\Artefact\ArtefactService;
use Gent\ErfgoedcollectiesApi\Service\Artefact\ArtefactServiceInterface;

/**
 * Factory to create the ArtefactService.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class Artefact
{
    /**
     * Expects a Client object.
     *
     * Will add the package handlers and inject the client and optional cache
     * into the ArtefactService.
     *
     * @param \DigipolisGent\API\Client\ClientInterface $client
     * @param \Psr\SimpleCache\CacheInterface|null $cache
     *
     * @return \Gent\ErfgoedcollectiesApi\Service\Artefact\ArtefactServiceInterface
     */
    public static function create(ClientInterface $client, ?CacheInterface $cache = null): ArtefactServiceInterface
    {
        $client->addHandler(new GetPagedHandler());
        $client->addHandler(new GetByIdentifierHandler());

        $service = new ArtefactService($client);
        if ($cache) {
            $service->setCacheService($cache);
        }

        return $service;
    }
}
