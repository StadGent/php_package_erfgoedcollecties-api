<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to get an Artefact by id.
 *
 * @var string $apiEndpoint
 * @var string $artefactIdentifier
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Artefact;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to get an Artefact by id.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Artefact service.');
$artefact = Artefact::create($client);

example_print_step('Get the artefact.');
example_print();

try {
    $item = $artefact->getByIdentifier($artefactIdentifier);

    example_sprintf(' Id                     : %s', $item->getId());
    example_sprintf(' Titel                  : %s', $item->getTitel());
    example_sprintf(' Titel EN               : %s', $item->getTitelEn());
    example_sprintf(' Titel FR               : %s', $item->getTitelFr());
    example_sprintf(' Titel NL               : %s', $item->getTitelNl());
    example_sprintf(' Afdeling               : %s', $item->getAfdeling());
    example_sprintf(' Afmetingen             : %s', $item->getAfmetingen());
    example_sprintf(' Alternatief nummer     : %s', $item->getAlternatiefNummer());
    example_sprintf(' Associatieonderwerpen  : %s', $item->getAssociatieOnderwerpen());
    example_sprintf(' Associatieperiodes     : %s', $item->getAssociatiePeriodes());
    example_sprintf(' Associatiepersonen     : %s', $item->getAssociatiePersonen());
    example_sprintf(' Bestaat uit            : %s', $item->getBestaatUit());
    example_sprintf(' Categorie              : %s', $item->getCategorie());
    example_sprintf(' Collectie              : %s', $item->getCollectie());
    example_sprintf(' Dossierstukken         : %s', $item->getDossierStukken());
    example_sprintf(' Iconografieonderwerpen : %s', $item->getIconografieOnderwerpen());
    example_sprintf(' Instelling naam        : %s', $item->getInstellingNaam());
    example_sprintf(' Instelling uri         : %s', $item->getInstellingUri());
    example_sprintf(' Koepelrecords          : %s', $item->getKoepelrecords());
    example_sprintf(' Materiaal              : %s', $item->getMateriaal());
    example_sprintf(' Objectnaam             : %s', $item->getObjectNaam());
    example_sprintf(' Objectnummer           : %s', $item->getObjectNummer());
    example_sprintf(' Omschrijving           : %s', $item->getOmschrijving());
    example_sprintf(' Omscrhijving EN        : %s', $item->getOmschrijvingEn());
    example_sprintf(' Omschrijving FR        : %s', $item->getOmschrijvingFr());
    example_sprintf(' Omschrijving NL        : %s', $item->getOmschrijvingNl());
    example_sprintf(' Opschriften            : %s', implode(', ', $item->getOpschriften()));
    example_sprintf(' Trefwoorden            : %s', $item->getTrefwoorden());
    example_sprintf(' Vervaardigingen        : %s', $item->getVervaardigingen());
    example_sprintf(' Verwerving             : %s', $item->getVerwerving());
    example_print();

} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
