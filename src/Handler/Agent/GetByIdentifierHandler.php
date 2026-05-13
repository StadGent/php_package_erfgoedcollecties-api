<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Agent;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Agent\GetByIdentifierRequest;
use Gent\ErfgoedcollectiesApi\Response\AgentResponse;
use Gent\ErfgoedcollectiesApi\Value\Agent;

/**
 * Handler to get an Agent by its external identifier.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Agent
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
    public function toResponse(ResponseInterface $response): AgentResponse
    {
        $data = $this->getBodyData($response);
        $agent = Agent::fromArray($data);
        return new AgentResponse($agent);
    }
}
