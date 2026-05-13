<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Artefact;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Artefact\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Request\Artefact\SearchRequest;
use Gent\ErfgoedcollectiesApi\Response\ArtefactsResponse;
use Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse as ArtefactsResponseValue;

/**
 * Handler to get a paginated list of Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Artefact
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
            SearchRequest::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(ResponseInterface $response): ArtefactsResponse
    {
        $data = $this->getBodyData($response);
        $artefactsResponse = ArtefactsResponseValue::fromArray($data);
        return new ArtefactsResponse($artefactsResponse);
    }
}
