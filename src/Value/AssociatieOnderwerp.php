<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * AssociatieOnderwerp value object.
 */
final class AssociatieOnderwerp extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The subject.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $onderwerp;

    /**
     * The relation.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $relatie;

    /**
     * Create the AssociatieOnderwerp from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerp
     */
    public static function fromArray(array $data): AssociatieOnderwerp
    {
        $associatie = new self();

        $associatie->onderwerp = isset($data['onderwerp']) && is_array($data['onderwerp'])
            ? IdProxyWithLabel::fromArray($data['onderwerp'])
            : null;

        $associatie->relatie = isset($data['relatie']) && is_array($data['relatie'])
            ? IdProxyWithLabel::fromArray($data['relatie'])
            : null;

        return $associatie;
    }

    /**
     * Get the subject.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getOnderwerp(): ?IdProxyWithLabel
    {
        return $this->onderwerp;
    }

    /**
     * Get the relation.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getRelatie(): ?IdProxyWithLabel
    {
        return $this->relatie;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerp $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerp $object */
        return $this->sameValueTypeAs($object)
            && $this->compareOnderwerpen($object)
            && $this->compareRelaties($object);
    }

    /**
     * Compare onderwerpen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerp $object
     *
     * @return bool
     */
    private function compareOnderwerpen(AssociatieOnderwerp $object): bool
    {
        if ($this->getOnderwerp() === null && $object->getOnderwerp() === null) {
            return true;
        }

        if ($this->getOnderwerp() === null || $object->getOnderwerp() === null) {
            return false;
        }

        return $this->getOnderwerp()->sameValueAs($object->getOnderwerp());
    }

    /**
     * Compare relaties.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerp $object
     *
     * @return bool
     */
    private function compareRelaties(AssociatieOnderwerp $object): bool
    {
        if ($this->getRelatie() === null && $object->getRelatie() === null) {
            return true;
        }

        if ($this->getRelatie() === null || $object->getRelatie() === null) {
            return false;
        }

        return $this->getRelatie()->sameValueAs($object->getRelatie());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $parts = [];

        if ($this->getOnderwerp()) {
            $parts[] = (string) $this->getOnderwerp();
        }

        if ($this->getRelatie()) {
            $parts[] = '(' . (string) $this->getRelatie() . ')';
        }

        return implode(' ', $parts);
    }
}
