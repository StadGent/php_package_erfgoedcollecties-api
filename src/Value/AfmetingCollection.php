<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of Afmeting value objects.
 */
final class AfmetingCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AfmetingCollection
     */
    public static function fromArray(array $data): AfmetingCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = Afmeting::fromArray($item);
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
            /** @var \Gent\ErfgoedcollectiesApi\Value\Afmeting $value */
            $items[] = (string) $value;
        }

        return implode(', ', $items);
    }
}
