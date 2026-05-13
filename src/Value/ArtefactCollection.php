<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of Artefact value objects.
 */
final class ArtefactCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ArtefactCollection
     */
    public static function fromArray(array $data): ArtefactCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = Artefact::fromArray($item);
        }

        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $items = [];
        foreach ($this->values as $value) {
            /** @var \Gent\ErfgoedcollectiesApi\Value\Artefact $value */
            $items[] = (string) $value;
        }

        return implode(', ', $items);
    }
}
