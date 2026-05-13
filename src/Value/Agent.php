<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Agent value object.
 */
final class Agent extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The unique identifier.
     *
     * @var string|null
     */
    private ?string $id;

    /**
     * The full name.
     *
     * @var string|null
     */
    private ?string $volledigeNaam;

    /**
     * Alternative names.
     *
     * @var array<string>
     */
    private array $alternatieveNamen;

    /**
     * Biography.
     *
     * @var string|null
     */
    private ?string $biografie;

    /**
     * Birth date.
     *
     * @var string|null
     */
    private ?string $geboortedatum;

    /**
     * Birth place.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $geboorteplaats;

    /**
     * Death date.
     *
     * @var string|null
     */
    private ?string $sterfdatum;

    /**
     * Death place.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    private ?IdProxyWithLabel $sterfplaats;

    /**
     * Gender.
     *
     * @var string|null
     */
    private ?string $geslacht;

    /**
     * Nationality.
     *
     * @var string|null
     */
    private ?string $nationaliteit;

    /**
     * External identifiers.
     *
     * @var array<string>
     */
    private array $externalIds;

    /**
     * Activities.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $activities;

    /**
     * Related entities.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $relatedEntities;

    /**
     * Attributed to.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxy|null
     */
    private ?IdProxy $attributedTo;

    /**
     * Create the Agent from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Agent
     */
    public static function fromArray(array $data): Agent
    {
        $agent = new self();
        $agent->id = $data['id'] ?? null;
        $agent->volledigeNaam = $data['volledigeNaam'] ?? null;
        $agent->alternatieveNamen = $data['alternatieveNamen'] ?? [];
        $agent->biografie = $data['biografie'] ?? null;
        $agent->geboortedatum = $data['geboortedatum'] ?? null;
        $agent->sterfdatum = $data['sterfdatum'] ?? null;
        $agent->geslacht = $data['geslacht'] ?? null;
        $agent->nationaliteit = $data['nationaliteit'] ?? null;
        $agent->externalIds = $data['externalIds'] ?? [];

        $agent->geboorteplaats = isset($data['geboorteplaats']) && is_array($data['geboorteplaats'])
            ? IdProxyWithLabel::fromArray($data['geboorteplaats'])
            : null;

        $agent->sterfplaats = isset($data['sterfplaats']) && is_array($data['sterfplaats'])
            ? IdProxyWithLabel::fromArray($data['sterfplaats'])
            : null;

        $activities = !empty($data['activities']) && is_array($data['activities'])
            ? $data['activities']
            : [];
        $agent->activities = IdProxyWithLabelCollection::fromArray($activities);

        $relatedEntities = !empty($data['relatedEntities']) && is_array($data['relatedEntities'])
            ? $data['relatedEntities']
            : [];
        $agent->relatedEntities = IdProxyWithLabelCollection::fromArray($relatedEntities);

        $agent->attributedTo = isset($data['attributedTo']) && is_array($data['attributedTo'])
            ? IdProxy::fromArray($data['attributedTo'])
            : null;

        return $agent;
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
     * Get the full name.
     *
     * @return string|null
     */
    public function getVolledigeNaam(): ?string
    {
        return $this->volledigeNaam;
    }

    /**
     * Get alternative names.
     *
     * @return array<string>
     */
    public function getAlternatieveNamen(): array
    {
        return $this->alternatieveNamen;
    }

    /**
     * Get the biography.
     *
     * @return string|null
     */
    public function getBiografie(): ?string
    {
        return $this->biografie;
    }

    /**
     * Get the birth date.
     *
     * @return string|null
     */
    public function getGeboortedatum(): ?string
    {
        return $this->geboortedatum;
    }

    /**
     * Get the birth place.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getGeboorteplaats(): ?IdProxyWithLabel
    {
        return $this->geboorteplaats;
    }

    /**
     * Get the death date.
     *
     * @return string|null
     */
    public function getSterfdatum(): ?string
    {
        return $this->sterfdatum;
    }

    /**
     * Get the death place.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabel|null
     */
    public function getSterfplaats(): ?IdProxyWithLabel
    {
        return $this->sterfplaats;
    }

    /**
     * Get the gender.
     *
     * @return string|null
     */
    public function getGeslacht(): ?string
    {
        return $this->geslacht;
    }

    /**
     * Get the nationality.
     *
     * @return string|null
     */
    public function getNationaliteit(): ?string
    {
        return $this->nationaliteit;
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
     * Get the activities.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getActivities(): IdProxyWithLabelCollection
    {
        return $this->activities;
    }

    /**
     * Get the related entities.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getRelatedEntities(): IdProxyWithLabelCollection
    {
        return $this->relatedEntities;
    }

    /**
     * Get attributed to.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxy|null
     */
    public function getAttributedTo(): ?IdProxy
    {
        return $this->attributedTo;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Agent $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Agent $object */
        return $this->sameValueTypeAs($object)
            && $this->getId() === $object->getId()
            && $this->getVolledigeNaam() === $object->getVolledigeNaam()
            && $this->getAlternatieveNamen() === $object->getAlternatieveNamen()
            && $this->getBiografie() === $object->getBiografie()
            && $this->getGeboortedatum() === $object->getGeboortedatum()
            && $this->compareGeboorteplaatsen($object)
            && $this->getSterfdatum() === $object->getSterfdatum()
            && $this->compareSterfplaatsen($object)
            && $this->getGeslacht() === $object->getGeslacht()
            && $this->getNationaliteit() === $object->getNationaliteit()
            && $this->getExternalIds() === $object->getExternalIds()
            && $this->getActivities()->sameValueAs($object->getActivities())
            && $this->getRelatedEntities()->sameValueAs($object->getRelatedEntities())
            && $this->compareAttributedTo($object);
    }

    /**
     * Compare geboorteplaatsen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Agent $object
     *
     * @return bool
     */
    private function compareGeboorteplaatsen(Agent $object): bool
    {
        if ($this->getGeboorteplaats() === null && $object->getGeboorteplaats() === null) {
            return true;
        }

        if ($this->getGeboorteplaats() === null || $object->getGeboorteplaats() === null) {
            return false;
        }

        return $this->getGeboorteplaats()->sameValueAs($object->getGeboorteplaats());
    }

    /**
     * Compare sterfplaatsen.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Agent $object
     *
     * @return bool
     */
    private function compareSterfplaatsen(Agent $object): bool
    {
        if ($this->getSterfplaats() === null && $object->getSterfplaats() === null) {
            return true;
        }

        if ($this->getSterfplaats() === null || $object->getSterfplaats() === null) {
            return false;
        }

        return $this->getSterfplaats()->sameValueAs($object->getSterfplaats());
    }

    /**
     * Compare attributedTo.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Agent $object
     *
     * @return bool
     */
    private function compareAttributedTo(Agent $object): bool
    {
        if ($this->getAttributedTo() === null && $object->getAttributedTo() === null) {
            return true;
        }

        if ($this->getAttributedTo() === null || $object->getAttributedTo() === null) {
            return false;
        }

        return $this->getAttributedTo()->sameValueAs($object->getAttributedTo());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getVolledigeNaam();
    }
}
