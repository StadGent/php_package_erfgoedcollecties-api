<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use Gent\ErfgoedcollectiesApi\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * IdProxyWithLabel value object.
 */
final class IdProxyWithLabel extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The reference type.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\ReferenceType|null
     */
    private ?ReferenceType $type;

    /**
     * The URI.
     *
     * @var string|null
     */
    private ?string $uri;

    /**
     * The label.
     *
     * @var string|null
     */
    private ?string $label;

    /**
     * The Dutch label.
     *
     * @var string|null
     */
    private ?string $labelNl;

    /**
     * The French label.
     *
     * @var string|null
     */
    private ?string $labelFr;

    /**
     * The English label.
     *
     * @var string|null
     */
    private ?string $labelEn;

    /**
     * Create the IdProxyWithLabel from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel
     */
    public static function fromArray(array $data): IdProxyWithLabel
    {
        $proxy = new self();
        $proxy->type = isset($data['type']) ? ReferenceType::from($data['type']) : null;
        $proxy->uri = $data['uri'] ?? null;
        $proxy->label = $data['label'] ?? null;
        $proxy->labelNl = $data['label_nl'] ?? null;
        $proxy->labelFr = $data['label_fr'] ?? null;
        $proxy->labelEn = $data['label_en'] ?? null;

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
     * Get the label.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Get the Dutch label.
     *
     * @return string|null
     */
    public function getLabelNl(): ?string
    {
        return $this->labelNl;
    }

    /**
     * Get the French label.
     *
     * @return string|null
     */
    public function getLabelFr(): ?string
    {
        return $this->labelFr;
    }

    /**
     * Get the English label.
     *
     * @return string|null
     */
    public function getLabelEn(): ?string
    {
        return $this->labelEn;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel $object */
        return $this->sameValueTypeAs($object)
            && $this->getType() === $object->getType()
            && $this->getUri() === $object->getUri()
            && $this->getLabel() === $object->getLabel()
            && $this->getLabelNl() === $object->getLabelNl()
            && $this->getLabelFr() === $object->getLabelFr()
            && $this->getLabelEn() === $object->getLabelEn();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) ($this->getLabel() ?? $this->getUri()) . ($this->type ? ' (' . ((string) $this->type->value) . ')'  : '');
    }

    protected function normalizePropertyNameForJson($name): string
    {
        return match ($name) {
            'labelNl' => 'label_nl',
            'labelFr' => 'label_fr',
            'labelEn' => 'label_en',
            default => parent::normalizePropertyNameForJson($name),
        };
    }
}
