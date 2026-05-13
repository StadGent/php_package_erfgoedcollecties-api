<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\Concept;

/**
 * Response containing a single Concept.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class ConceptResponse implements ResponseInterface
{
    /**
     * The concept.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\Concept
     */
    private Concept $concept;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Concept $concept
     */
    public function __construct(Concept $concept)
    {
        $this->concept = $concept;
    }

    /**
     * Get the concept.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Concept
     */
    public function getConcept(): Concept
    {
        return $this->concept;
    }
}
