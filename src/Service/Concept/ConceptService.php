<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Service\Concept;

use DateTimeInterface;
use Exception;
use Gent\ErfgoedcollectiesApi\Exception\ExceptionFactory;
use Gent\ErfgoedcollectiesApi\Request\Concept\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Request\Concept\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Response\ConceptResponse;
use Gent\ErfgoedcollectiesApi\Response\ConceptsResponse;
use Gent\ErfgoedcollectiesApi\Service\ServiceAbstract;
use Gent\ErfgoedcollectiesApi\Value\Concept;
use Gent\ErfgoedcollectiesApi\Value\ConceptsResponse as ConceptsResponseValue;

/**
 * Service to access the Concept related API.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
final class ConceptService extends ServiceAbstract implements ConceptServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getPaged(int $page = 1, int $pageSize = 10, ?DateTimeInterface $modifiedSince = null): ConceptsResponseValue
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'concepts',
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
        /** @var \Gent\ErfgoedcollectiesApi\Response\ConceptsResponse $response */
        $response = $this->send(
            new GetPagedRequest($page, $pageSize, $modifiedSince),
            ConceptsResponse::class
        );

        $result = $response->getConceptsResponse();
        $this->cacheSet($cacheKey, $result);

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getByIdentifier(string $identifier): Concept
    {
        $cacheKey = $this->createCacheKeyFromArray([
            'concept',
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
            /** @var \Gent\ErfgoedcollectiesApi\Response\ConceptResponse $response */
            $response = $this->send(
                new GetByIdentifierRequest($identifier),
                ConceptResponse::class
            );
        } catch (Exception $e) {
            throw ExceptionFactory::fromException($e);
        }

        $concept = $response->getConcept();
        $this->cacheSet($cacheKey, $concept);

        return $concept;
    }
}
