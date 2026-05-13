<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Concept;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Concept\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Response\ConceptsResponse;
use Gent\ErfgoedcollectiesApi\Value\ConceptsResponse as ConceptsResponseValue;

/**
 * Handler to get a paginated list of Concepts.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Concept
 */
final class GetPagedHandler extends HandlerAbstract
{
    /**
     * @inheritDoc
     */
    public function handles(): array
    {
        return [
            GetPagedRequest::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(ResponseInterface $response): ConceptsResponse
    {
        $data = $this->getBodyData($response);
        $conceptsResponse = ConceptsResponseValue::fromArray($data);
        return new ConceptsResponse($conceptsResponse);
    }
}
