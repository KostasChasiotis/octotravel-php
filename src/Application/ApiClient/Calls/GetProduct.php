<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\ProductMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Product;


/**
 * Fetch the product for the given id.
 */
class GetProduct extends OctoClient implements ApiCallInterface
{
    private string $productId;

    private Client $client;

    public function __construct(string $productId, Client $client)
    {
        $this->productId = $productId;
        $this->client = $client;
    }

    public function execute(): Product
    {
        $response = $this->client->get('products/' . $this->productId);

        return (ProductMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
