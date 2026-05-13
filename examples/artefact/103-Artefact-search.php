<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to search Artifacts.
 *
 * @var string $apiEndpoint
 * @var string $artefactSearchQuery
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Artefact;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to search Artifacts.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Artefact service.');
$artefact = Artefact::create($client);

example_print_step('Search artefacts.');
example_print();

try {
    $response = $artefact->search($artefactSearchQuery);
    $collection = $response->getArtefacts();
    if ($collection->getIterator()->count()) {
        foreach ($collection as $item) {
            /* @var $item \Gent\ErfgoedcollectiesApi\Value\Artefact */
            example_sprintf(' Id       : %s', $item->getId());
            example_sprintf(' Titel    : %s', $item->getTitel());
            example_print();
        }
    } else {
        example_print(' ! No Artefacts found.');
    }
} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
