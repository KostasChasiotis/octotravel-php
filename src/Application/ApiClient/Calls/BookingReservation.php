<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingReservationUnitItems;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * Reserving availability when making a booking.
 * 
 * The steps to make a reservation are:
 * 
 * 1. Check Availability: Check the availability on the /availability endpoint to retrieve an availabilityId
 * 
 * 2. Booking Reservation (this step): Create a booking that reserves the availability while you collect payment
 * and contact information from the customer. 
 * The booking will remain with status ON_HOLD until the booking is confirmed or the reservation hold expires.
 * 
 * The availability for the booking is held for the amount of time equal to theexpirationMinutes parameter 
 * (if provided), up to an internal limit set by either the supplier or the OCTo provider. 
 * The utc_expires_at parameter in the response object will indicate when a reservtion will expire. 
 * A reservation can be extended by calling the /bookings/{uuid}/extend endpoint.
 * 
 * A reserved booking can be confirmed after the customer finalizes their choice 
 * on the /bookings/{uuid}/confirm endpoint provided the reservation had not expired.
 */
class BookingReservation extends OctoClient implements ApiCallInterface
{
    private ?Uuid $uuid;

    private string $productId;

    private string $optionId;

    private string $availabilityId;

    private ?int $expirationMinutes;

    private ?string $notes;

    private BookingReservationUnitItems $unitItems;

    private Client $client;

    public function __construct(
        ?Uuid $uuid,
        string $productId,
        string $optionId,
        string $availabilityId,
        ?int $expirationMinutes,
        ?string $notes,
        BookingReservationUnitItems $unitItems,
        Client $client
    ) {
        $this->uuid = $uuid;
        $this->productId = $productId;
        $this->optionId = $optionId;
        $this->availabilityId = $availabilityId;
        $this->expirationMinutes = $expirationMinutes;
        $this->notes = $notes;
        $this->unitItems = $unitItems;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->post('bookings', [
            'json' => [
                'uuid' => $this->uuid ? $this->uuid->toString() : null,
                'productId' => $this->productId,
                'optionId' => $this->optionId,
                'availabilityId' => $this->availabilityId,
                'expirationMinutes' => $this->expirationMinutes ?? null,
                'notes' => $this->notes ?? null,
                'unitItems' => $this->unitItems->toArray()
            ]
        ]);

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
