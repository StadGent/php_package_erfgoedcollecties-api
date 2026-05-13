<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\Artefact;

/**
 * Response containing a single Artefact.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class ArtefactResponse implements ResponseInterface
{
    /**
     * The artefact.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\Artefact
     */
    private Artefact $artefact;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Artefact $artefact
     */
    public function __construct(Artefact $artefact)
    {
        $this->artefact = $artefact;
    }

    /**
     * Get the artefact.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Artefact
     */
    public function getArtefact(): Artefact
    {
        return $this->artefact;
    }
}
