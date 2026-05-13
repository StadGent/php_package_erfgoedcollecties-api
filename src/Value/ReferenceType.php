<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

/**
 * ReferenceType enum.
 */
enum ReferenceType: string
{
    case Concept = 'Concept';
    case Agent = 'Agent';
    case Artefact = 'Artefact';

    /**
     * Create a ReferenceType from an array of data.
     *
     * @param array $data
     *   The data to extract the value from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ReferenceType|null
     */
    public static function fromArray(array $data): ?ReferenceType
    {
        $type = $data['type'] ?? null;

        return self::tryFrom($type);
    }

    /**
     * Check if this is a Concept reference.
     *
     * @return bool
     */
    public function isConcept(): bool
    {
        return $this === self::Concept;
    }

    /**
     * Check if this is an Agent reference.
     *
     * @return bool
     */
    public function isAgent(): bool
    {
        return $this === self::Agent;
    }

    /**
     * Check if this is an Artefact reference.
     *
     * @return bool
     */
    public function isArtefact(): bool
    {
        return $this === self::Artefact;
    }
}
