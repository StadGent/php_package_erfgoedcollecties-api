<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse as ArtefactsResponseValue;

/**
 * Response containing a paginated list of Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class ArtefactsResponse implements ResponseInterface
{
    /**
     * The artefacts response value.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse
     */
    private ArtefactsResponseValue $artefactsResponse;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse $artefactsResponse
     */
    public function __construct(ArtefactsResponseValue $artefactsResponse)
    {
        $this->artefactsResponse = $artefactsResponse;
    }

    /**
     * Get the artefacts response value.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ArtefactsResponse
     */
    public function getArtefactsResponse(): ArtefactsResponseValue
    {
        return $this->artefactsResponse;
    }
}
