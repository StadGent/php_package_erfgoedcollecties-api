<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use Gent\ErfgoedcollectiesApi\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * IdProxy value object.
 */
final class IdProxy extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The reference type.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\ReferenceType
     */
    private ReferenceType $type;

    /**
     * The URI.
     *
     * @var string|null
     */
    private ?string $uri;

    /**
     * Create the IdProxy from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxy
     */
    public static function fromArray(array $data): IdProxy
    {
        $proxy = new self();
        $proxy->type = ReferenceType::from($data['type']);
        $proxy->uri = $data['uri'];

        return $proxy;
    }

    /**
     * Get the reference type.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ReferenceType
     */
    public function getType(): ReferenceType
    {
        return $this->type;
    }

    /**
     * Get the URI.
     *
     * @return string|null
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\IdProxy $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\IdProxy $object */
        return $this->sameValueTypeAs($object)
            && $this->getType() === $object->getType()
            && $this->getUri() === $object->getUri();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getUri() . ' (' . ((string) $this->type->value) . ')';
    }
}
