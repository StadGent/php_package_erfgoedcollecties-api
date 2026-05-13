<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to get a Concept by id.
 *
 * @var string $apiEndpoint
 * @var string $conceptIdentifier
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Concept;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to get a Concept by id.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Concept service.');
$concept = Concept::create($client);

example_print_step('Get the Concept.');
example_print();

try {
    $item = $concept->getByIdentifier($conceptIdentifier);

    example_sprintf(' Id                : %s', $item->getId());
    example_sprintf(' Label             : %s', $item->getLabel());
    example_sprintf(' Label EN          : %s', $item->getLabelEn());
    example_sprintf(' Label FR          : %s', $item->getLabelFr());
    example_sprintf(' Label NL          : %s', $item->getLabelNl());
    example_sprintf(' Boader concepts   : %s', $item->getBroaderConcepts());
    example_sprintf(' Narrower concepts : %s', $item->getNarrowerConcepts());
    example_sprintf(' External ids      : %s', implode(', ', $item->getExternalIds()));
    example_sprintf(' Scope note        : %s', $item->getScopeNote());
    example_sprintf(' Scope note NL     : %s', $item->getScopeNoteNl());
    example_print();

} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
