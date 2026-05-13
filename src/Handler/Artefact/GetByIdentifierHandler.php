<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Artefact;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Artefact\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Response\ArtefactResponse;
use Gent\ErfgoedcollectiesApi\Value\Artefact;

/**
 * Handler to get an Artefact by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Artefact
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
    public function toResponse(ResponseInterface $response): ArtefactResponse
    {
        $data = $this->getBodyData($response);
        $artefact = Artefact::fromArray($data);
        return new ArtefactResponse($artefact);
    }
}
