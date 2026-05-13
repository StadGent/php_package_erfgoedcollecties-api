<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\ConceptsResponse as ConceptsResponseValue;

/**
 * Response containing a paginated list of Concepts.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class ConceptsResponse implements ResponseInterface
{
    /**
     * The concepts response value.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse
     */
    private ConceptsResponseValue $conceptsResponse;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse $conceptsResponse
     */
    public function __construct(ConceptsResponseValue $conceptsResponse)
    {
        $this->conceptsResponse = $conceptsResponse;
    }

    /**
     * Get the concepts response value.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse
     */
    public function getConceptsResponse(): ConceptsResponseValue
    {
        return $this->conceptsResponse;
    }
}
