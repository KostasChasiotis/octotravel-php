<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use DateTimeImmutable;
use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingsMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Bookings;

/**
 * This endpoint will fetch the bookings you have made for the given filters.
 * 
 * When using this endpoint you must include one of the following query parameters:
 * 
 * resellerReference
 * 
 * supplierReference
 * 
 * localDate
 * 
 * localDateStart and localDateEnd
 */
class GetBookings extends OctoClient implements ApiCallInterface
{
    /**
     * @var null|string The reseller reference on the booking
     */
    private ?string $resellerReference;

    /**
     * @var null|string The reference provided by the supplier
     */
    private ?string $supplerReference;

    /**
     * @var null|DateTimeImmutable All bookings made for a specific date
     */
    private ?DateTimeImmutable $localDate;

    /**
     * @var null|DateTimeImmutable First date of a date range search
     */
    private ?DateTimeImmutable $localDateStart;

    /**
     * @var null|DateTimeImmutable Last  date of a date range search
     */
    private ?DateTimeImmutable $localDateEnd;

    /**
     * @var null|string The product id to filter by
     */
    private ?string $productId;

    /**
     * @var null|string The option id to filter by
     */
    private ?string $optionId;

    private Client $client;

    public function __construct(
        ?string $resellerReference,
        ?string $supplerReference,
        ?DateTimeImmutable $localDate,
        ?DateTimeImmutable $localDateStart,
        ?DateTimeImmutable $localDateEnd,
        ?string $productId,
        ?string $optionId,
        Client $client
    ) {
        $this->resellerReference = $resellerReference;
        $this->supplerReference = $supplerReference;
        $this->localDate = $localDate;
        $this->localDateStart = $localDateStart;
        $this->localDateEnd = $localDateEnd;
        $this->productId = $productId;
        $this->optionId = $optionId;
        $this->client = $client;
    }

    public function execute(): Bookings
    {
        $response = $this->client->get('bookings', [
            'query' => [
                'resellerReference' => $this->resellerReference ?? null,
                'supplerReference' => $this->supplerReference ?? null,
                'localDate' => $this->localDate ? $this->localDate->format('c') : null,
                'localDateStart' => $this->localDateStart ? $this->localDateStart->format('c') : null,
                'localDateEnd' => $this->localDateEnd ? $this->localDateEnd->format('c') : null,
                'productId' => $this->productId ?? null,
                'optionId' => $this->optionId ?? null
            ]
        ]);

        return (BookingsMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
