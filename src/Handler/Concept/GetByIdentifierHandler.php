<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Concept;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Concept\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Response\ConceptResponse;
use Gent\ErfgoedcollectiesApi\Value\Concept;

/**
 * Handler to get a Concept by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Concept
 */
final class GetByIdentifierHandler extends HandlerAbstract
{
    /**
     * @inheritDoc
     */
    public function handles(): array
    {
        return [
            GetByIdentifierRequest::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(ResponseInterface $response): ConceptResponse
    {
        $data = $this->getBodyData($response);
        $concept = Concept::fromArray($data);
        return new ConceptResponse($concept);
    }
}
