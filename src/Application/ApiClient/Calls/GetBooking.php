<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * Fetch the status of an existing booking.
 */
class GetBooking extends OctoClient implements ApiCallInterface
{
    private Uuid $uuid;

    private Client $client;

    public function __construct(Uuid $uuid, Client $client)
    {
        $this->uuid = $uuid;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->get('bookings/' . $this->uuid->toString());

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
