<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * AlternatiefNummer value object.
 */
final class AlternatiefNummer extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The nummer.
     *
     * @var string|null
     */
    private ?string $nummer;

    /**
     * The type.
     *
     * @var string|null
     */
    private ?string $type;

    /**
     * Create the AlternatiefNummer from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AlternatiefNummer
     */
    public static function fromArray(array $data): AlternatiefNummer
    {
        $alternatiefNummer = new self();
        $alternatiefNummer->nummer = $data['nummer'] ?? null;
        $alternatiefNummer->type = $data['type'] ?? null;

        return $alternatiefNummer;
    }

    /**
     * Get the nummer.
     *
     * @return string|null
     */
    public function getNummer(): ?string
    {
        return $this->nummer;
    }

    /**
     * Get the type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\AlternatiefNummer $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\AlternatiefNummer $object */
        return $this->sameValueTypeAs($object)
            && $this->getNummer() === $object->getNummer()
            && $this->getType() === $object->getType();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getNummer();
    }
}
