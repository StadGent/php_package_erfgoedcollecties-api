<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Handler;

use Psr\Http\Message\ResponseInterface;

/**
 * Abstract base Handler.
 *
 * @package Gent\ErfgoedcollectiesApi\Handler
 */
abstract class HandlerAbstract implements \DigipolisGent\API\Client\Handler\HandlerInterface
{
    /**
     * Get the array version of the response body.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array<string, mixed>
     *
     * @throws \JsonException
     */
    protected function getBodyData(ResponseInterface $response): array
    {
        $raw = (string) $response->getBody();
        return json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
    }
}
