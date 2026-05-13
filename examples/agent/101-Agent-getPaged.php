<?php

/**
 * Gent\ErfgoedcollectiesApi Examples.
 *
 * Example how to get a list of all available Agents.
 *
 * @var string $apiEndpoint
 */

use DigipolisGent\API\Client\Configuration\Configuration;
use Gent\ErfgoedcollectiesApi\Agent;
use Gent\ErfgoedcollectiesApi\Client\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

example_print_header('Example how to get a list of all available Agents.');

example_print_step('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

example_print_step('Create the Guzzle client.');
$guzzleClient = new GuzzleClient(['base_uri' => $configuration->getUri()]);

example_print_step('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);
$client->addLogger(new ExampleLogger());

example_print_step('Get the Agent service.');
$agent = Agent::create($client);

example_print_step('Get the first 100 agents.');
example_print();

try {
    $response = $agent->getPaged();
    $collection = $response->getAgents();
    if ($collection->getIterator()->count()) {
        foreach ($collection as $item) {
            /* @var $item \Gent\ErfgoedcollectiesApi\Value\Agent */
            example_sprintf(' Id       : %s', $item->getId());
            example_sprintf(' Naam     : %s', $item->getVolledigeNaam());
            example_print();
        }
    } else {
        example_print(' ! No Agents found.');
    }
} catch (Exception $e) {
    example_sprintf(' ! Error : %s', $e->getMessage());
}

example_print_footer();
