<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler\Agent;

use Psr\Http\Message\ResponseInterface;
use Gent\ErfgoedcollectiesApi\Handler\HandlerAbstract;
use Gent\ErfgoedcollectiesApi\Request\Agent\GetPagedRequest;
use Gent\ErfgoedcollectiesApi\Response\AgentsResponse;
use Gent\ErfgoedcollectiesApi\Value\AgentsResponse as AgentsResponseValue;

/**
 * Handler to get a paginated list of Agents.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler\Agent
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
        ];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(ResponseInterface $response): AgentsResponse
    {
        $data = $this->getBodyData($response);
        $agentsResponse = AgentsResponseValue::fromArray($data);
        return new AgentsResponse($agentsResponse);
    }
}
