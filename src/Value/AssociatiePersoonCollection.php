<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of AssociatiePersoon value objects.
 */
final class AssociatiePersoonCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoonCollection
     */
    public static function fromArray(array $data): AssociatiePersoonCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = AssociatiePersoon::fromArray($item);
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
            /** @var \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon $value */
            $items[] = (string) $value;
        }

        return implode(', ', $items);
    }
}
