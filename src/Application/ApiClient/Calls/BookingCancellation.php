<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * For cancelling bookings. 
 * 
 * You can only cancel a booking if booking.cancellable is TRUE, 
 * and is within the booking cancellation cut-off window.
 */
class BookingCancellation extends OctoClient implements ApiCallInterface
{
    /**
     * @var Uuid The UUID of the booking
     */
    private Uuid $uuid;

    /**
     * @var null|string A text value describing why the cancellation happened.
     */
    private ?string $reason;

    private bool $force;

    private Client $client;

    public function __construct(
        Uuid $uuid,
        ?string $reason,
        bool $force,
        Client $client
    ) {
        $this->uuid = $uuid;
        $this->reason = $reason;
        $this->force = $force;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->post('bookings/' . $this->uuid->toString() . '/cancel', [
            'json' => [
                'reason' => $this->reason ?? null,
                'force' => $this->force
            ]
        ]);

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
