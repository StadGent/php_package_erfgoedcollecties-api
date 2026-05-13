<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of Vervaardiging value objects.
 */
final class VervaardigingCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\VervaardigingCollection
     */
    public static function fromArray(array $data): VervaardigingCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = Vervaardiging::fromArray($item);
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
            /** @var \Gent\ErfgoedcollectiesApi\Value\Vervaardiging $value */
            $items[] = (string) $value;
        }

        return implode(', ', $items);
    }
}
