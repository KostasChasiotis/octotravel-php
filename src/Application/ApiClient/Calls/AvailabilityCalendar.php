<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use DateTimeImmutable;
use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\AvailabilityCalendarArrayMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnits;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\AvailabilityCalendarArray;

/**
 * This endpoint is highly optimised and will return a single object per day. 
 * It's designed to be queried for large date ranges and the result is used to populate an availability calendar.
 * 
 * When the end user selects an open date you can call on /availability endpoint 
 * to get the availabilityId to create the booking.
 */
class AvailabilityCalendar extends OctoClient implements ApiCallInterface
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
     * @var DateTimeImmutable Start date to query for (YYYY-MM-DD).
     */
    private DateTimeImmutable $localDateStart;

    /**
     * @var DateTimeImmutable Start date to query for (YYYY-MM-DD).
     */
    private DateTimeImmutable $localDateEnd;

    /**
     * @var AvailabilityUnits A list of units.
     */
    private ?AvailabilityUnits $units;

    /**
     * @var Client The GuzzleHttp Client
     */
    private Client $client;

    public function __construct(
        string $productId,
        string $optionId,
        DateTimeImmutable $localDateStart,
        DateTimeImmutable $localDateEnd,
        ?AvailabilityUnits $units,
        Client $client,
    ) {
        $this->productId = $productId;
        $this->optionId = $optionId;
        $this->localDateStart = $localDateStart;
        $this->localDateEnd = $localDateEnd;
        $this->units = $units;
        $this->client = $client;
    }

    public function execute(): AvailabilityCalendarArray
    {
        $response = $this->client->post('availability/calendar', [
            'json' => [
                'productId' => $this->productId,
                'optionId' => $this->optionId,
                'localDateStart' => $this->localDateStart->format('Y-m-d'),
                'localDateEnd' => $this->localDateEnd->format('Y-m-d'),
                'units' => $this->units ? $this->units->toArray() : null
            ]
        ]);

        return AvailabilityCalendarArrayMapper::map(json_decode($response->getBody()->getContents(), true));
    }
}
