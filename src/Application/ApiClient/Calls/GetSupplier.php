<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\SupplierMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Supplier;

/**
 * Returns the supplier and associated contact details.
 */
class GetSupplier extends OctoClient implements ApiCallInterface
{
    private Client $client;

    public function __construct(
        Client $client,
    ) {
        $this->client = $client;
    }

    public function execute(): Supplier
    {
        $response = $this->client->get('supplier');

        return SupplierMapper::map(json_decode($response->getBody()->getContents(), true));
    }
}
