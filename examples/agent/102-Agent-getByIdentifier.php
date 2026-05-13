<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to get an Agent by id.
 *
 * @var string $apiEndpoint
 * @var string $agentIdentifier
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Agent;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to get an Agent by id.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Agent service.');
$agent = Agent::create($client);

example_print_step('Get the agent.');
example_print();

try {
    $item = $agent->getByIdentifier($agentIdentifier);

    example_sprintf(' Id                : %s', $item->getId());
    example_sprintf(' Naam              : %s', $item->getVolledigeNaam());
    example_sprintf(' Alternatieve namen: %s', implode(', ', $item->getAlternatieveNamen()));
    example_sprintf(' Geslacht          : %s', $item->getGeslacht());
    example_sprintf(' Nationaliteit     : %s', $item->getNationaliteit());
    example_sprintf(' Geboorteplaats    : %s', $item->getGeboorteplaats());
    example_sprintf(' Geboortedatum     : %s', $item->getGeboortedatum());
    example_sprintf(' Sterfplaats       : %s', $item->getSterfplaats());
    example_sprintf(' Sterfdatum        : %s', $item->getSterfdatum());
    example_sprintf(' Biografie         : %s', $item->getBiografie());
    example_sprintf(' Attributed To     : %s', $item->getAttributedTo());
    example_sprintf(' External Ids      : %s', implode(', ', $item->getExternalIds()));
    example_sprintf(' Activities        : %s', $item->getActivities());
    example_sprintf(' Related Entities  : %s', $item->getRelatedEntities());
    example_print();

} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
