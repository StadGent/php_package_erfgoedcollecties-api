<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Concept value object.
 *
 * @SuppressWarnings("PHPMD.ShortVariable")
 * @SuppressWarnings("PHPMD.CyclomaticComplexity")
 */
final class Concept extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The unique identifier.
     *
     * @var string|null
     */
    private ?string $id;

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
     * The scope note.
     *
     * @var string|null
     */
    private ?string $scopeNote;

    /**
     * The Dutch scope note.
     *
     * @var string|null
     */
    private ?string $scopeNoteNl;

    /**
     * External identifiers.
     *
     * @var array<string>
     */
    private array $externalIds;

    /**
     * Broader concepts.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $broaderConcepts;

    /**
     * Narrower concepts.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $narrowerConcepts;

    /**
     * Create the Concept from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Concept
     */
    public static function fromArray(array $data): Concept
    {
        $concept = new self();
        $concept->id = $data['id'] ?? null;
        $concept->label = $data['label'] ?? null;
        $concept->labelNl = $data['label_nl'] ?? null;
        $concept->labelFr = $data['label_fr'] ?? null;
        $concept->labelEn = $data['label_en'] ?? null;
        $concept->scopeNote = $data['scopeNote'] ?? null;
        $concept->scopeNoteNl = $data['scopeNote_nl'] ?? null;
        $concept->externalIds = $data['externalIds'] ?? [];

        $broaderConcepts = !empty($data['broaderConcepts']) && is_array($data['broaderConcepts'])
            ? $data['broaderConcepts']
            : [];
        $concept->broaderConcepts = IdProxyWithLabelCollection::fromArray($broaderConcepts);

        $narrowerConcepts = !empty($data['narrowerConcepts']) && is_array($data['narrowerConcepts'])
            ? $data['narrowerConcepts']
            : [];
        $concept->narrowerConcepts = IdProxyWithLabelCollection::fromArray($narrowerConcepts);

        return $concept;
    }

    /**
     * Get the unique identifier.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
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
     * Get the scope note.
     *
     * @return string|null
     */
    public function getScopeNote(): ?string
    {
        return $this->scopeNote;
    }

    /**
     * Get the Dutch scope note.
     *
     * @return string|null
     */
    public function getScopeNoteNl(): ?string
    {
        return $this->scopeNoteNl;
    }

    /**
     * Get external identifiers.
     *
     * @return array<string>
     */
    public function getExternalIds(): array
    {
        return $this->externalIds;
    }

    /**
     * Get broader concepts.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getBroaderConcepts(): IdProxyWithLabelCollection
    {
        return $this->broaderConcepts;
    }

    /**
     * Get narrower concepts.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getNarrowerConcepts(): IdProxyWithLabelCollection
    {
        return $this->narrowerConcepts;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Concept $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Concept $object */
        return $this->sameValueTypeAs($object)
            && $this->getId() === $object->getId()
            && $this->getLabel() === $object->getLabel()
            && $this->getLabelNl() === $object->getLabelNl()
            && $this->getLabelFr() === $object->getLabelFr()
            && $this->getLabelEn() === $object->getLabelEn()
            && $this->getScopeNote() === $object->getScopeNote()
            && $this->getScopeNoteNl() === $object->getScopeNoteNl()
            && $this->getExternalIds() === $object->getExternalIds()
            && $this->getBroaderConcepts()->sameValueAs($object->getBroaderConcepts())
            && $this->getNarrowerConcepts()->sameValueAs($object->getNarrowerConcepts());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getLabel();
    }
}
