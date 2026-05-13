<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * AssociatiePersoon value object.
 */
final class AssociatiePersoon extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The person.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $persoon;

    /**
     * The role.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $rol;

    /**
     * Create the AssociatiePersoon from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon
     */
    public static function fromArray(array $data): AssociatiePersoon
    {
        $associatie = new self();

        $associatie->persoon = isset($data['persoon']) && is_array($data['persoon'])
            ? IdProxyWithLabel::fromArray($data['persoon'])
            : null;

        $associatie->rol = isset($data['rol']) && is_array($data['rol'])
            ? IdProxyWithLabel::fromArray($data['rol'])
            : null;

        return $associatie;
    }

    /**
     * Get the person.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getPersoon(): ?IdProxyWithLabel
    {
        return $this->persoon;
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
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon $object */
        return $this->sameValueTypeAs($object)
            && $this->comparePersonen($object)
            && $this->compareRollen($object);
    }

    /**
     * Compare personen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon $object
     *
     * @return bool
     */
    private function comparePersonen(AssociatiePersoon $object): bool
    {
        if ($this->getPersoon() === null && $object->getPersoon() === null) {
            return true;
        }

        if ($this->getPersoon() === null || $object->getPersoon() === null) {
            return false;
        }

        return $this->getPersoon()->sameValueAs($object->getPersoon());
    }

    /**
     * Compare rollen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoon $object
     *
     * @return bool
     */
    private function compareRollen(AssociatiePersoon $object): bool
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
        $parts = [];

        if ($this->getPersoon()) {
            $parts[] = (string) $this->getPersoon();
        }

        if ($this->getRol()) {
            $parts[] = '(' . (string) $this->getRol() . ')';
        }

        return implode(' ', $parts);
    }
}
