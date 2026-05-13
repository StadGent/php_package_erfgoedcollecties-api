<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Verwerving (acquisition) value object.
 */
final class Verwerving extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The period begin.
     *
     * @var string|null
     */
    private ?string $periodeBegin;

    /**
     * The period end.
     *
     * @var string|null
     */
    private ?string $periodeEinde;

    /**
     * The place.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $plaats;

    /**
     * The used technique.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $gebruikteTechniek;

    /**
     * Transferred to.
     *
     * @var string|null
     */
    private ?string $overgedragenAan;

    /**
     * Create the Verwerving from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Verwerving
     */
    public static function fromArray(array $data): Verwerving
    {
        $verwerving = new self();
        $verwerving->periodeBegin = $data['periodeBegin'] ?? null;
        $verwerving->periodeEinde = $data['periodeEinde'] ?? null;
        $verwerving->overgedragenAan = $data['overgedragenAan'] ?? null;

        $verwerving->plaats = isset($data['plaats']) && is_array($data['plaats'])
            ? IdProxyWithLabel::fromArray($data['plaats'])
            : null;

        $verwerving->gebruikteTechniek = isset($data['gebruikteTechniek']) && is_array($data['gebruikteTechniek'])
            ? IdProxyWithLabel::fromArray($data['gebruikteTechniek'])
            : null;

        return $verwerving;
    }

    /**
     * Get the period begin.
     *
     * @return string|null
     */
    public function getPeriodeBegin(): ?string
    {
        return $this->periodeBegin;
    }

    /**
     * Get the period end.
     *
     * @return string|null
     */
    public function getPeriodeEinde(): ?string
    {
        return $this->periodeEinde;
    }

    /**
     * Get the place.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getPlaats(): ?IdProxyWithLabel
    {
        return $this->plaats;
    }

    /**
     * Get the used technique.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getGebruikteTechniek(): ?IdProxyWithLabel
    {
        return $this->gebruikteTechniek;
    }

    /**
     * Get transferred to.
     *
     * @return string|null
     */
    public function getOvergedragenAan(): ?string
    {
        return $this->overgedragenAan;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Verwerving $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Verwerving $object */
        return $this->sameValueTypeAs($object)
            && $this->getPeriodeBegin() === $object->getPeriodeBegin()
            && $this->getPeriodeEinde() === $object->getPeriodeEinde()
            && $this->getOvergedragenAan() === $object->getOvergedragenAan()
            && $this->comparePlaces($object)
            && $this->compareTechnieken($object);
    }

    /**
     * Compare places.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Verwerving $object
     *
     * @return bool
     */
    private function comparePlaces(Verwerving $object): bool
    {
        if ($this->getPlaats() === null && $object->getPlaats() === null) {
            return true;
        }

        if ($this->getPlaats() === null || $object->getPlaats() === null) {
            return false;
        }

        return $this->getPlaats()->sameValueAs($object->getPlaats());
    }

    /**
     * Compare technieken.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Verwerving $object
     *
     * @return bool
     */
    private function compareTechnieken(Verwerving $object): bool
    {
        if ($this->getGebruikteTechniek() === null && $object->getGebruikteTechniek() === null) {
            return true;
        }

        if ($this->getGebruikteTechniek() === null || $object->getGebruikteTechniek() === null) {
            return false;
        }

        return $this->getGebruikteTechniek()->sameValueAs($object->getGebruikteTechniek());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf(
            '%s - %s',
            $this->getPeriodeBegin() ?? '',
            $this->getPeriodeEinde() ?? ''
        );
    }
}
