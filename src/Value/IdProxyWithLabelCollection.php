<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\CollectionAbstract;
use Gent\ErfgoedcollectiesApi\Value\ValueFromArrayInterface;

/**
 * Collection of IdProxyWithLabel value objects.
 */
final class IdProxyWithLabelCollection extends CollectionAbstract implements ValueFromArrayInterface
{
    /**
     * Create the collection from an array of data.
     *
     * @param array $data
     *   The data to create the collection from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public static function fromArray(array $data): IdProxyWithLabelCollection
    {
        $collection = new self();

        foreach ($data as $key => $item) {
            $collection->values[$key] = IdProxyWithLabel::fromArray($item);
        }

        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $labels = [];
        foreach ($this->values as $value) {
            /** @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel $value */
            $labels[] = (string) $value;
        }

        return implode(', ', $labels);
    }
}
