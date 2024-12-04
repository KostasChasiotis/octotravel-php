<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use DateTimeImmutable;
use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\AvailabilitiesMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnits;

/**
 * This endpoint is slightly slower as it will return an object for each individual departure time (or day).
 * 
 * You have to perform this step to retrieve an availabilityId in order to confirm a sale, 
 * so if you just want to use this endpoint and skip the calendar endpoint then that's perfectly ok.
 */
class AvailabilityCheck extends OctoClient implements ApiCallInterface
{
    /**
     * @var string The product id.
     */
    private string $productId;

    /**
     * @var string The option id.
     */
    private string $optionId;

    /**
     * @var null|DateTimeImmutable Start date to query for (YYYY-MM-DD). Required if localDateEnd is set.
     */
    private ?DateTimeImmutable $localDateStart;

    /**
     * @var null|DateTimeImmutable End date to query for (YYYY-MM-DD). Required if localDateStart is set.
     */
    private ?DateTimeImmutable $localDataEnd;

    /**
     * @var null|array Filter the results by the given ids.
     */
    private ?array $availabilityIds;

    /**
     * @var null|AvailabilityUnits A list of units.
     */
    private ?AvailabilityUnits $units;

    /**
     * @var Client The GuzzleHttp Client
     */
    private Client $client;

    public function __construct(
        string $productId,
        string $optionId,
        ?DateTimeImmutable $localDateStart,
        ?DateTimeImmutable $localDataEnd,
        ?array $availabilityIds,
        ?AvailabilityUnits $units,
        Client $client,
    ) {
        $this->productId = $productId;
        $this->optionId = $optionId;
        $this->localDateStart = $localDateStart;
        $this->localDataEnd = $localDataEnd;
        $this->availabilityIds = $availabilityIds;
        $this->units = $units;
        $this->client = $client;
    }

    public function execute(): mixed
    {
        $response = $this->client->post('availability', [
            'json' => [
                'productId' => $this->productId,
                'optionId' => $this->optionId,
                'localDateStart' => $this->localDateStart ? $this->localDateStart->format('Y-m-d') : null,
                'localDateEnd' => $this->localDataEnd ? $this->localDataEnd->format('Y-m-d') : null,
                'availabilityIds' => $this->availabilityIds ?? null,
                'units' => $this->units ? $this->units->toArray() : null
            ]
        ]);

        return AvailabilitiesMapper::map(json_decode($response->getBody()->getContents(), true));
    }
}
