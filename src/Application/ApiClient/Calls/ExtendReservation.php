<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * Use this endpoint to hold the availability for a booking longer if the status is ON_HOLD.
 */
class ExtendReservation extends OctoClient implements ApiCallInterface
{
    /**
     * @var Uuid The UUID of the booking
     */
    private Uuid $uuid;

    /**
     * @var int The amount in minutes to replace the initial expiration
     */
    private int $expirationMinutes;

    private Client $client;

    public function __construct(
        Uuid $uuid,
        int $expirationMinutes,
        Client $client
    ) {
        $this->uuid = $uuid;
        $this->expirationMinutes = $expirationMinutes;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->post('bookings/' . $this->uuid->toString() . '/extend', [
            'json' => [
                'expirationMinutes' => $this->expirationMinutes
            ]
        ]);

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
