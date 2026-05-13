<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\AgentsResponse as AgentsResponseValue;

/**
 * Response containing a paginated list of Agents.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class AgentsResponse implements ResponseInterface
{
    /**
     * The agents response value.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AgentsResponse
     */
    private AgentsResponseValue $agentsResponse;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\AgentsResponse $agentsResponse
     */
    public function __construct(AgentsResponseValue $agentsResponse)
    {
        $this->agentsResponse = $agentsResponse;
    }

    /**
     * Get the agents response value.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AgentsResponse
     */
    public function getAgentsResponse(): AgentsResponseValue
    {
        return $this->agentsResponse;
    }
}
