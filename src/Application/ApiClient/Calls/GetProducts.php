<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\ProductsMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Products;

/**
 * Fetch the list of products.
 */
class GetProducts extends OctoClient implements ApiCallInterface
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function execute(): Products
    {
        $response = $this->client->get('products');

        return (ProductsMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
