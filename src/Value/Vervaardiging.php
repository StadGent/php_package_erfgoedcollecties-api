<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use Gent\ErfgoedcollectiesApi\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Vervaardiging (creation/production) value object.
 */
final class Vervaardiging extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The type of production.
     *
     * @var string|null
     */
    private ?string $typeVervaardiging;

    /**
     * The start date.
     *
     * @var string|null
     */
    private ?string $startDatum;

    /**
     * The end date.
     *
     * @var string|null
     */
    private ?string $eindDatum;

    /**
     * The EDTF date.
     *
     * @var string|null
     */
    private ?string $datumEdtf;

    /**
     * The place of production.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $plaats;

    /**
     * The producer/creator.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $vervaardiger;

    /**
     * The role.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $rol;

    /**
     * The techniques used.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $technieken;

    /**
     * Create the Vervaardiging from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Vervaardiging
     */
    public static function fromArray(array $data): Vervaardiging
    {
        $vervaardiging = new self();
        $vervaardiging->typeVervaardiging = $data['typeVervaardiging'] ?? null;
        $vervaardiging->startDatum = $data['startDatum'] ?? null;
        $vervaardiging->eindDatum = $data['eindDatum'] ?? null;
        $vervaardiging->datumEdtf = $data['datumEDTF'] ?? null;

        $vervaardiging->plaats = isset($data['plaats']) && is_array($data['plaats'])
            ? IdProxyWithLabel::fromArray($data['plaats'])
            : null;

        $vervaardiging->vervaardiger = isset($data['vervaardiger']) && is_array($data['vervaardiger'])
            ? IdProxyWithLabel::fromArray($data['vervaardiger'])
            : null;

        $vervaardiging->rol = isset($data['rol']) && is_array($data['rol'])
            ? IdProxyWithLabel::fromArray($data['rol'])
            : null;

        $technieken = !empty($data['technieken']) && is_array($data['technieken'])
            ? $data['technieken']
            : [];
        $vervaardiging->technieken = IdProxyWithLabelCollection::fromArray($technieken);

        return $vervaardiging;
    }

    /**
     * Get the type of production.
     *
     * @return string|null
     */
    public function getTypeVervaardiging(): ?string
    {
        return $this->typeVervaardiging;
    }

    /**
     * Get the start date.
     *
     * @return string|null
     */
    public function getStartDatum(): ?string
    {
        return $this->startDatum;
    }

    /**
     * Get the end date.
     *
     * @return string|null
     */
    public function getEindDatum(): ?string
    {
        return $this->eindDatum;
    }

    /**
     * Get the EDTF date.
     *
     * @return string|null
     */
    public function getDatumEdtf(): ?string
    {
        return $this->datumEdtf;
    }

    /**
     * Get the place of production.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getPlaats(): ?IdProxyWithLabel
    {
        return $this->plaats;
    }

    /**
     * Get the producer/creator.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getVervaardiger(): ?IdProxyWithLabel
    {
        return $this->vervaardiger;
    }

    /**
     * Get the role.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getRol(): ?IdProxyWithLabel
    {
        return $this->rol;
    }

    /**
     * Get the techniques used.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getTechnieken(): IdProxyWithLabelCollection
    {
        return $this->technieken;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Vervaardiging $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Vervaardiging $object */
        return $this->sameValueTypeAs($object)
            && $this->getTypeVervaardiging() === $object->getTypeVervaardiging()
            && $this->getStartDatum() === $object->getStartDatum()
            && $this->getEindDatum() === $object->getEindDatum()
            && $this->getDatumEdtf() === $object->getDatumEdtf()
            && $this->comparePlaces($object)
            && $this->compareVervaardigers($object)
            && $this->compareRollen($object)
            && $this->getTechnieken()->sameValueAs($object->getTechnieken());
    }

    /**
     * Compare places.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Vervaardiging $object
     *
     * @return bool
     */
    private function comparePlaces(Vervaardiging $object): bool
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
     * Compare vervaardigers.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Vervaardiging $object
     *
     * @return bool
     */
    private function compareVervaardigers(Vervaardiging $object): bool
    {
        if ($this->getVervaardiger() === null && $object->getVervaardiger() === null) {
            return true;
        }

        if ($this->getVervaardiger() === null || $object->getVervaardiger() === null) {
            return false;
        }

        return $this->getVervaardiger()->sameValueAs($object->getVervaardiger());
    }

    /**
     * Compare rollen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Vervaardiging $object
     *
     * @return bool
     */
    private function compareRollen(Vervaardiging $object): bool
    {
        if ($this->getRol() === null && $object->getRol() === null) {
            return true;
        }

        if ($this->getRol() === null || $object->getRol() === null) {
            return false;
        }

        return $this->getRol()->sameValueAs($object->getRol());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getTypeVervaardiging();
    }

    protected function normalizePropertyNameForJson($name): string
    {
        return match ($name) {
            'datumEdtf' => 'datumEDTF',
            default => parent::normalizePropertyNameForJson($name),
        };
    }
}
