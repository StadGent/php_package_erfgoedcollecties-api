<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Value\Agent;

/**
 * Response containing a single Agent.
 *
 * @package Gent\ErfgoedcollectiesApi\Response
 */
final class AgentResponse implements ResponseInterface
{
    /**
     * The agent.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\Agent
     */
    private Agent $agent;

    /**
     * Constructs the response.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Agent $agent
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Get the agent.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Agent
     */
    public function getAgent(): Agent
    {
        return $this->agent;
    }
}
