<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Exception;

use Exception;

/**
 * Exception thrown when a resource is not found.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
class NotFoundException extends Exception
{
    /**
     * Create exception for agent not found.
     *
     * @param string $identifier
     *   The agent identifier.
     *
     * @return self
     */
    public static function agentNotFound(string $identifier): self
    {
        return new self(
            sprintf('Agent with identifier "%s" not found.', $identifier)
        );
    }

    /**
     * Create exception for artefact not found.
     *
     * @param string $identifier
     *   The artefact identifier.
     *
     * @return self
     */
    public static function artefactNotFound(string $identifier): self
    {
        return new self(
            sprintf('Artefact with identifier "%s" not found.', $identifier)
        );
    }

    /**
     * Create exception for concept not found.
     *
     * @param string $identifier
     *   The concept identifier.
     *
     * @return self
     */
    public static function conceptNotFound(string $identifier): self
    {
        return new self(
            sprintf('Concept with identifier "%s" not found.', $identifier)
        );
    }
}
