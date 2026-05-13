<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of FysiekOnderdeel value objects.
 */
final class FysiekOnderdeelCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeelCollection
     */
    public static function fromArray(array $data): FysiekOnderdeelCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = FysiekOnderdeel::fromArray($item);
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
            /** @var \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeel $value */
            $items[] = (string) $value;
        }

        return implode(', ', $items);
    }
}
