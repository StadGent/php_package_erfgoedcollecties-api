<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Artefact;

use DateTimeInterface;
use Exception;
use Gent\ErfgoedcollectiesApi\Exception\ExceptionFactory;
use Gent\ErfgoedcollectiesApi\Request\Artefact\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Request\Artefact\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Request\Artefact\SearchRequest;
use Gent\ErfgoedcollectiesApi\Response\ArtefactResponse;
use Gent\ErfgoedcollectiesApi\Response\ArtefactsResponse;
use Gent\ErfgoedcollectiesApi\Service\ServiceAbstract;
use Gent\ErfgoedcollectiesApi\Value\Artefact;
use Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse as ArtefactsResponseValue;

/**
 * Service to access the Artefact related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class ArtefactService extends ServiceAbstract implements ArtefactServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getPaged(int $page = 1, int $pageSize = 10, ?DateTimeInterface $modifiedSince = null): ArtefactsResponseValue
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'artefacts',
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
        /** @var \Gent\ErfgoedcollectiesApi\Response\ArtefactsResponse $response */
        $response = $this->send(
            new GetPagedRequest($page, $pageSize, $modifiedSince),
            ArtefactsResponse::class
        );

        $result = $response->getArtefactsResponse();
        $this->cacheSet($cacheKey, $result);

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function search(string $query, int $page = 1, int $pageSize = 10): ArtefactsResponseValue
    {
        // Search results are never cached.
        /** @var \Gent\ErfgoedcollectiesApi\Response\ArtefactsResponse $response */
        $response = $this->send(
            new SearchRequest($query, $page, $pageSize),
            ArtefactsResponse::class
        );

        return $response->getArtefactsResponse();
    }

    /**
     * @inheritDoc
     */
    public function getByIdentifier(string $identifier): Artefact
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'artefact',
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
            /** @var \Gent\ErfgoedcollectiesApi\Response\ArtefactResponse $response */
            $response = $this->send(
                new GetByIdentifierRequest($identifier),
                ArtefactResponse::class
            );
        } catch (Exception $e) {
            throw ExceptionFactory::fromException($e);
        }

        $artefact = $response->getArtefact();
        $this->cacheSet($cacheKey, $artefact);

        return $artefact;
    }
}
