<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * FysiekOnderdeel (physical part) value object.
 */
final class FysiekOnderdeel extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The name.
     *
     * @var string|null
     */
    private ?string $naam;

    /**
     * The materials.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $materiaal;

    /**
     * The dimensions.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AfmetingCollection
     */
    private AfmetingCollection $afmetingen;

    /**
     * Create the FysiekOnderdeel from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeel
     */
    public static function fromArray(array $data): FysiekOnderdeel
    {
        $onderdeel = new self();
        $onderdeel->naam = $data['naam'] ?? null;

        $materiaal = !empty($data['materiaal']) && is_array($data['materiaal'])
            ? $data['materiaal']
            : [];
        $onderdeel->materiaal = IdProxyWithLabelCollection::fromArray($materiaal);

        $afmetingen = !empty($data['afmetingen']) && is_array($data['afmetingen'])
            ? $data['afmetingen']
            : [];
        $onderdeel->afmetingen = AfmetingCollection::fromArray($afmetingen);

        return $onderdeel;
    }

    /**
     * Get the name.
     *
     * @return string|null
     */
    public function getNaam(): ?string
    {
        return $this->naam;
    }

    /**
     * Get the materials.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getMateriaal(): IdProxyWithLabelCollection
    {
        return $this->materiaal;
    }

    /**
     * Get the dimensions.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AfmetingCollection
     */
    public function getAfmetingen(): AfmetingCollection
    {
        return $this->afmetingen;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeel $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeel $object */
        return $this->sameValueTypeAs($object)
            && $this->getNaam() === $object->getNaam()
            && $this->getMateriaal()->sameValueAs($object->getMateriaal())
            && $this->getAfmetingen()->sameValueAs($object->getAfmetingen());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getNaam();
    }
}
