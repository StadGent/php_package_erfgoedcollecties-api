<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Artefact value object.
 */
final class Artefact extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The unique identifier.
     *
     * @var string|null
     */
    private ?string $id;

    /**
     * The institution name.
     *
     * @var string|null
     */
    private ?string $instellingNaam;

    /**
     * The institution URI.
     *
     * @var string|null
     */
    private ?string $instellingUri;

    /**
     * The department.
     *
     * @var string|null
     */
    private ?string $afdeling;

    /**
     * The object number.
     *
     * @var string|null
     */
    private ?string $objectNummer;

    /**
     * The alternative number.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AlternatiefNummer|null
     */
    private ?AlternatiefNummer $alternatiefNummer;

    /**
     * The object name.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection|null
     */
    private ?IdProxyWithLabelCollection $objectNaam;

    /**
     * The categories.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $categorie;

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $titel;

    /**
     * The Dutch title.
     *
     * @var string|null
     */
    private ?string $titelNl;

    /**
     * The French title.
     *
     * @var string|null
     */
    private ?string $titelFr;

    /**
     * The English title.
     *
     * @var string|null
     */
    private ?string $titelEn;

    /**
     * The description.
     *
     * @var string|null
     */
    private ?string $omschrijving;

    /**
     * The Dutch description.
     *
     * @var string|null
     */
    private ?string $omschrijvingNl;

    /**
     * The French description.
     *
     * @var string|null
     */
    private ?string $omschrijvingFr;

    /**
     * The English description.
     *
     * @var string|null
     */
    private ?string $omschrijvingEn;

    /**
     * The collections.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $collectie;

    /**
     * The parent records.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $koepelrecords;

    /**
     * Consists of.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $bestaatUit;

    /**
     * Dossier pieces.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $dossierStukken;

    /**
     * Productions/creations.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\VervaardigingCollection
     */
    private VervaardigingCollection $vervaardigingen;

    /**
     * Dimensions.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AfmetingCollection
     */
    private AfmetingCollection $afmetingen;

    /**
     * Materials.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $materiaal;

    /**
     * Physical parts.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeelCollection
     */
    private FysiekOnderdeelCollection $fysiekeOnderdelen;

    /**
     * Acquisition.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\Verwerving|null
     */
    private ?Verwerving $verwerving;

    /**
     * Keywords.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $trefwoorden;

    /**
     * Associated persons.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoonCollection
     */
    private AssociatiePersoonCollection $associatiePersonen;

    /**
     * Associated subjects.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerpCollection
     */
    private AssociatieOnderwerpCollection $associatieOnderwerpen;

    /**
     * Associated periods.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $associatiePeriodes;

    /**
     * Iconography persons.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $iconografiePersonen;

    /**
     * Iconography subjects.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    private IdProxyWithLabelCollection $iconografieOnderwerpen;

    /**
     * Inscriptions.
     *
     * @var array<string>
     */
    private array $opschriften;

    /**
     * Building permit approval.
     *
     * @var string|null
     */
    private ?string $goedkeuringBouwaanvraag;

    /**
     * Is on display.
     *
     * @var bool
     */
    private bool $isOpZaal;

    /**
     * Create the Artefact from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Artefact
     */
    public static function fromArray(array $data): Artefact
    {
        $artefact = new self();
        $artefact->id = $data['id'] ?? null;
        $artefact->instellingNaam = $data['instellingNaam'] ?? null;
        $artefact->instellingUri = $data['instellingUri'] ?? null;
        $artefact->afdeling = $data['afdeling'] ?? null;
        $artefact->objectNummer = $data['objectNummer'] ?? null;
        $artefact->titel = $data['titel'] ?? null;
        $artefact->titelNl = $data['titel_nl'] ?? null;
        $artefact->titelFr = $data['titel_fr'] ?? null;
        $artefact->titelEn = $data['titel_en'] ?? null;
        $artefact->omschrijving = $data['omschrijving'] ?? null;
        $artefact->omschrijvingNl = $data['omschrijving_nl'] ?? null;
        $artefact->omschrijvingFr = $data['omschrijving_fr'] ?? null;
        $artefact->omschrijvingEn = $data['omschrijving_en'] ?? null;
        $artefact->opschriften = $data['opschriften'] ?? [];
        $artefact->goedkeuringBouwaanvraag = $data['goedkeuringBouwaanvraag'] ?? null;
        $artefact->isOpZaal = !empty($data['isOpZaal']);

        $artefact->alternatiefNummer = isset($data['alternatiefNummer']) && is_array($data['alternatiefNummer'])
            ? AlternatiefNummer::fromArray($data['alternatiefNummer'])
            : null;

        $artefact->verwerving = isset($data['verwerving']) && is_array($data['verwerving'])
            ? Verwerving::fromArray($data['verwerving'])
            : null;

        // Collections
        $artefact->categorie = IdProxyWithLabelCollection::fromArray(
            !empty($data['categorie']) && is_array($data['categorie']) ? $data['categorie'] : []
        );
        $artefact->collectie = IdProxyWithLabelCollection::fromArray(
            !empty($data['collectie']) && is_array($data['collectie']) ? $data['collectie'] : []
        );
        $artefact->koepelrecords = IdProxyWithLabelCollection::fromArray(
            !empty($data['koepelrecords']) && is_array($data['koepelrecords']) ? $data['koepelrecords'] : []
        );
        $artefact->bestaatUit = IdProxyWithLabelCollection::fromArray(
            !empty($data['bestaatUit']) && is_array($data['bestaatUit']) ? $data['bestaatUit'] : []
        );
        $artefact->dossierStukken = IdProxyWithLabelCollection::fromArray(
            !empty($data['dossierStukken']) && is_array($data['dossierStukken']) ? $data['dossierStukken'] : []
        );
        $artefact->materiaal = IdProxyWithLabelCollection::fromArray(
            !empty($data['materiaal']) && is_array($data['materiaal']) ? $data['materiaal'] : []
        );
        $artefact->trefwoorden = IdProxyWithLabelCollection::fromArray(
            !empty($data['trefwoorden']) && is_array($data['trefwoorden']) ? $data['trefwoorden'] : []
        );
        $artefact->associatiePeriodes = IdProxyWithLabelCollection::fromArray(
            !empty($data['associatiePeriodes']) && is_array($data['associatiePeriodes']) ? $data['associatiePeriodes'] : []
        );
        $artefact->iconografiePersonen = IdProxyWithLabelCollection::fromArray(
            !empty($data['iconografiePersonen']) && is_array($data['iconografiePersonen']) ? $data['iconografiePersonen'] : []
        );
        $artefact->iconografieOnderwerpen = IdProxyWithLabelCollection::fromArray(
            !empty($data['iconografieOnderwerpen']) && is_array($data['iconografieOnderwerpen']) ? $data['iconografieOnderwerpen'] : []
        );

        $artefact->objectNaam = IdProxyWithLabelCollection::fromArray(
            !empty($data['objectNaam']) && is_array($data['objectNaam']) ? $data['objectNaam'] : []
        );

        // Specialized collections
        $artefact->vervaardigingen = VervaardigingCollection::fromArray(
            !empty($data['vervaardigingen']) && is_array($data['vervaardigingen']) ? $data['vervaardigingen'] : []
        );
        $artefact->afmetingen = AfmetingCollection::fromArray(
            !empty($data['afmetingen']) && is_array($data['afmetingen']) ? $data['afmetingen'] : []
        );
        $artefact->fysiekeOnderdelen = FysiekOnderdeelCollection::fromArray(
            !empty($data['fysiekeOnderdelen']) && is_array($data['fysiekeOnderdelen']) ? $data['fysiekeOnderdelen'] : []
        );
        $artefact->associatiePersonen = AssociatiePersoonCollection::fromArray(
            !empty($data['associatiePersonen']) && is_array($data['associatiePersonen']) ? $data['associatiePersonen'] : []
        );
        $artefact->associatieOnderwerpen = AssociatieOnderwerpCollection::fromArray(
            !empty($data['associatieOnderwerpen']) && is_array($data['associatieOnderwerpen']) ? $data['associatieOnderwerpen'] : []
        );

        return $artefact;
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
     * Get the institution name.
     *
     * @return string|null
     */
    public function getInstellingNaam(): ?string
    {
        return $this->instellingNaam;
    }

    /**
     * Get the institution URI.
     *
     * @return string|null
     */
    public function getInstellingUri(): ?string
    {
        return $this->instellingUri;
    }

    /**
     * Get the department.
     *
     * @return string|null
     */
    public function getAfdeling(): ?string
    {
        return $this->afdeling;
    }

    /**
     * Get the object number.
     *
     * @return string|null
     */
    public function getObjectNummer(): ?string
    {
        return $this->objectNummer;
    }

    /**
     * Get the alternative number.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AlternatiefNummer|null
     */
    public function getAlternatiefNummer(): ?AlternatiefNummer
    {
        return $this->alternatiefNummer;
    }

    /**
     * Get the object name.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection|null
     */
    public function getObjectNaam(): ?IdProxyWithLabelCollection
    {
        return $this->objectNaam;
    }

    /**
     * Get the categories.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getCategorie(): IdProxyWithLabelCollection
    {
        return $this->categorie;
    }

    /**
     * Get the title.
     *
     * @return string|null
     */
    public function getTitel(): ?string
    {
        return $this->titel;
    }

    /**
     * Get the Dutch title.
     *
     * @return string|null
     */
    public function getTitelNl(): ?string
    {
        return $this->titelNl;
    }

    /**
     * Get the French title.
     *
     * @return string|null
     */
    public function getTitelFr(): ?string
    {
        return $this->titelFr;
    }

    /**
     * Get the English title.
     *
     * @return string|null
     */
    public function getTitelEn(): ?string
    {
        return $this->titelEn;
    }

    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    /**
     * Get the Dutch description.
     *
     * @return string|null
     */
    public function getOmschrijvingNl(): ?string
    {
        return $this->omschrijvingNl;
    }

    /**
     * Get the French description.
     *
     * @return string|null
     */
    public function getOmschrijvingFr(): ?string
    {
        return $this->omschrijvingFr;
    }

    /**
     * Get the English description.
     *
     * @return string|null
     */
    public function getOmschrijvingEn(): ?string
    {
        return $this->omschrijvingEn;
    }

    /**
     * Get the collections.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getCollectie(): IdProxyWithLabelCollection
    {
        return $this->collectie;
    }

    /**
     * Get the parent records.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getKoepelrecords(): IdProxyWithLabelCollection
    {
        return $this->koepelrecords;
    }

    /**
     * Get consists of.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getBestaatUit(): IdProxyWithLabelCollection
    {
        return $this->bestaatUit;
    }

    /**
     * Get dossier pieces.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getDossierStukken(): IdProxyWithLabelCollection
    {
        return $this->dossierStukken;
    }

    /**
     * Get productions/creations.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\VervaardigingCollection
     */
    public function getVervaardigingen(): VervaardigingCollection
    {
        return $this->vervaardigingen;
    }

    /**
     * Get dimensions.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AfmetingCollection
     */
    public function getAfmetingen(): AfmetingCollection
    {
        return $this->afmetingen;
    }

    /**
     * Get materials.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getMateriaal(): IdProxyWithLabelCollection
    {
        return $this->materiaal;
    }

    /**
     * Get physical parts.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\FysiekOnderdeelCollection
     */
    public function getFysiekeOnderdelen(): FysiekOnderdeelCollection
    {
        return $this->fysiekeOnderdelen;
    }

    /**
     * Get acquisition.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\Verwerving|null
     */
    public function getVerwerving(): ?Verwerving
    {
        return $this->verwerving;
    }

    /**
     * Get keywords.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getTrefwoorden(): IdProxyWithLabelCollection
    {
        return $this->trefwoorden;
    }

    /**
     * Get associated persons.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AssociatiePersoonCollection
     */
    public function getAssociatiePersonen(): AssociatiePersoonCollection
    {
        return $this->associatiePersonen;
    }

    /**
     * Get associated subjects.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\AssociatieOnderwerpCollection
     */
    public function getAssociatieOnderwerpen(): AssociatieOnderwerpCollection
    {
        return $this->associatieOnderwerpen;
    }

    /**
     * Get associated periods.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getAssociatiePeriodes(): IdProxyWithLabelCollection
    {
        return $this->associatiePeriodes;
    }

    /**
     * Get iconography persons.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getIconografiePersonen(): IdProxyWithLabelCollection
    {
        return $this->iconografiePersonen;
    }

    /**
     * Get iconography subjects.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\IdProxyWithLabelCollection
     */
    public function getIconografieOnderwerpen(): IdProxyWithLabelCollection
    {
        return $this->iconografieOnderwerpen;
    }

    /**
     * Get inscriptions.
     *
     * @return array<string>
     */
    public function getOpschriften(): array
    {
        return $this->opschriften;
    }

    /**
     * Get building permit approval.
     *
     * @return string|null
     */
    public function getGoedkeuringBouwaanvraag(): ?string
    {
        return $this->goedkeuringBouwaanvraag;
    }

    /**
     * Check if on display.
     *
     * @return bool
     */
    public function isOpZaal(): bool
    {
        return $this->isOpZaal;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\Artefact $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\Artefact $object */
        return $this->sameValueTypeAs($object)
            && $this->getId() === $object->getId()
            && $this->getInstellingNaam() === $object->getInstellingNaam()
            && $this->getInstellingUri() === $object->getInstellingUri()
            && $this->getAfdeling() === $object->getAfdeling()
            && $this->getObjectNummer() === $object->getObjectNummer()
            && $this->compareAlternatiefNummer($object)
            && $this->compareObjectNaam($object)
            && $this->getCategorie()->sameValueAs($object->getCategorie())
            && $this->getTitel() === $object->getTitel()
            && $this->getTitelNl() === $object->getTitelNl()
            && $this->getTitelFr() === $object->getTitelFr()
            && $this->getTitelEn() === $object->getTitelEn()
            && $this->getOmschrijving() === $object->getOmschrijving()
            && $this->getOmschrijvingNl() === $object->getOmschrijvingNl()
            && $this->getOmschrijvingFr() === $object->getOmschrijvingFr()
            && $this->getOmschrijvingEn() === $object->getOmschrijvingEn()
            && $this->getCollectie()->sameValueAs($object->getCollectie())
            && $this->getKoepelrecords()->sameValueAs($object->getKoepelrecords())
            && $this->getBestaatUit()->sameValueAs($object->getBestaatUit())
            && $this->getDossierStukken()->sameValueAs($object->getDossierStukken())
            && $this->getVervaardigingen()->sameValueAs($object->getVervaardigingen())
            && $this->getAfmetingen()->sameValueAs($object->getAfmetingen())
            && $this->getMateriaal()->sameValueAs($object->getMateriaal())
            && $this->getFysiekeOnderdelen()->sameValueAs($object->getFysiekeOnderdelen())
            && $this->compareVerwerving($object)
            && $this->getTrefwoorden()->sameValueAs($object->getTrefwoorden())
            && $this->getAssociatiePersonen()->sameValueAs($object->getAssociatiePersonen())
            && $this->getAssociatieOnderwerpen()->sameValueAs($object->getAssociatieOnderwerpen())
            && $this->getAssociatiePeriodes()->sameValueAs($object->getAssociatiePeriodes())
            && $this->getIconografiePersonen()->sameValueAs($object->getIconografiePersonen())
            && $this->getIconografieOnderwerpen()->sameValueAs($object->getIconografieOnderwerpen())
            && $this->getOpschriften() === $object->getOpschriften()
            && $this->getGoedkeuringBouwaanvraag() === $object->getGoedkeuringBouwaanvraag()
            && $this->isOpZaal() === $object->isOpZaal();
    }

    /**
     * Compare alternatiefNummer.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Artefact $object
     *
     * @return bool
     */
    private function compareAlternatiefNummer(Artefact $object): bool
    {
        if ($this->getAlternatiefNummer() === null && $object->getAlternatiefNummer() === null) {
            return true;
        }

        if ($this->getAlternatiefNummer() === null || $object->getAlternatiefNummer() === null) {
            return false;
        }

        return $this->getAlternatiefNummer()->sameValueAs($object->getAlternatiefNummer());
    }

    /**
     * Compare objectNaam.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Artefact $object
     *
     * @return bool
     */
    private function compareObjectNaam(Artefact $object): bool
    {
        if ($this->getObjectNaam() === null && $object->getObjectNaam() === null) {
            return true;
        }

        if ($this->getObjectNaam() === null || $object->getObjectNaam() === null) {
            return false;
        }

        return $this->getObjectNaam()->sameValueAs($object->getObjectNaam());
    }

    /**
     * Compare verwerving.
     *
     * @param \Gent\ErfgoedcollectiesApi\Value\Artefact $object
     *
     * @return bool
     */
    private function compareVerwerving(Artefact $object): bool
    {
        if ($this->getVerwerving() === null && $object->getVerwerving() === null) {
            return true;
        }

        if ($this->getVerwerving() === null || $object->getVerwerving() === null) {
            return false;
        }

        return $this->getVerwerving()->sameValueAs($object->getVerwerving());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->getTitel();
    }
}
