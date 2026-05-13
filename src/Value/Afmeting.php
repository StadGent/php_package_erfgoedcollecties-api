<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Afmeting (dimension) value object.
 */
final class Afmeting extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The dimension type.
     *
     * @var string|null
     */
    private ?string $type;

    /**
     * The dimension value.
     *
     * @var float|null
     */
    private ?float $waarde;

    /**
     * The unit.
     *
     * @var string|null
     */
    private ?string $eenheid;

    /**
     * Create the Afmeting from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Afmeting
     */
    public static function fromArray(array $data): Afmeting
    {
        $afmeting = new self();
        $afmeting->type = $data['type'] ?? null;
        $afmeting->waarde = isset($data['waarde']) ? (float) $data['waarde'] : null;
        $afmeting->eenheid = $data['eenheid'] ?? null;

        return $afmeting;
    }

    /**
     * Get the dimension type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Get the dimension value.
     *
     * @return float|null
     */
    public function getWaarde(): ?float
    {
        return $this->waarde;
    }

    /**
     * Get the unit.
     *
     * @return string|null
     */
    public function getEenheid(): ?string
    {
        return $this->eenheid;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Afmeting $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Afmeting $object */
        return $this->sameValueTypeAs($object)
            && $this->getType() === $object->getType()
            && $this->getWaarde() === $object->getWaarde()
            && $this->getEenheid() === $object->getEenheid();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf(
            '%s: %s %s',
            $this->getType() ?? '',
            $this->getWaarde() ?? '',
            $this->getEenheid() ?? ''
        );
    }
}
