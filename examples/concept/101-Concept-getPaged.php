<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to get a list of all available Concepts.
 *
 * @var string $apiEndpoint
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Concept;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to get a list of all available Concepts.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Concept service.');
$concept = Concept::create($client);

example_print_step('Get the first 100 concepts.');
example_print();

try {
    $response = $concept->getPaged();
    $collection = $response->getConcepts();
    if ($collection->getIterator()->count()) {
        foreach ($collection as $item) {
            /* @var $item \Gent\ErfgoedcollectiesApi\Value\Concept */
            example_sprintf(' Id       : %s', $item->getId());
            example_sprintf(' Titel    : %s', $item->getLabel());
            example_print();
        }
    } else {
        example_print(' ! No Concepts found.');
    }
} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
