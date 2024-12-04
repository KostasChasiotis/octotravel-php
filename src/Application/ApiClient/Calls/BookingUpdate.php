<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;
use KostasChasiotis\OctoTravel\Application\Mappers\BookingMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItems;
use KostasChasiotis\OctoTravel\Domain\Entities\Contact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * Updates a booking before and after it has been confirmed as long as it hasn't been redeemed or within
 * the cancellation cutoff window.
 * 
 * To know if the booking can be updated check the booking's cancellable field.
 * If the booking can be cancelled, it can also be updated. 
 * It's generally preferred to update a booking rather than cancelling it and rebooking.
 */
class BookingUpdate extends OctoClient implements ApiCallInterface
{
    /**
     * @var Uuid The UUID of the booking
     */
    private Uuid $uuid;

    /**
     * @var null|string Your reference for this booking. Also known as a Voucher Number.
     */
    private ?string $resellerReference;

    /**
     * @var null|string The product ID.
     */
    private ?string $productId;

    /**
     * @var null|string The option id.
     */
    private ?string $optionId;

    /**
     * @var null|string The availability ID for the selected timeslot.
     */
    private ?string $availabilityId;

    /**
     * @var null|string How many minutes to reserve the availability, otherwise defaults to the supplier default amount
     */
    private ?string $expirationMinutes;

    /**
     * @var null|string Optional notes for the booking.
     */
    private ?string $notes;

    /**
     * @var bool Whether you want OCTO Cloud to email the guest a copy of their receipt and tickets. (defaults to false)
     */
    private bool $emailReceipt;

    /**
     * An array of unit items in the booking.
     * 
     * To retain or modify existing unit items, you must include the unit item with the associated uuid,
     * otherwise that unit item will be removed.
     * 
     * @var null|BookingConfirmationUnitItems
     */
    private ?BookingConfirmationUnitItems $unitItems;

    /**
     * Contact details for the main guest who will attend the tour/attraction.
     * 
     * Contact schema can be applied to both the booking object (the main reservation) 
     * or the unit object (individual ticket holders - if the supplier requires this information).
     * 
     * @var null|Contact
     */
    private ?Contact $contact;

    private Client $client;

    public function __construct(
        Uuid $uuid,
        ?string $resellerReference,
        ?string $productId,
        ?string $optionId,
        ?string $availabilityId,
        ?string $expirationMinutes,
        ?string $notes,
        bool $emailReceipt,
        ?BookingConfirmationUnitItems $unitItems,
        ?Contact $contact,
        Client $client
    ) {
        $this->uuid = $uuid;
        $this->resellerReference = $resellerReference;
        $this->productId = $productId;
        $this->optionId = $optionId;
        $this->availabilityId = $availabilityId;
        $this->expirationMinutes = $expirationMinutes;
        $this->notes = $notes;
        $this->emailReceipt = $emailReceipt;
        $this->unitItems = $unitItems;
        $this->contact = $contact;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->patch('bookings/' . $this->uuid->toString(), [
            'json' => [
                'resellerReference' => $this->resellerReference ?? null,
                'productId' => $this->productId ?? null,
                'optionId' => $this->optionId ?? null,
                'availabilityId' => $this->availabilityId ?? null,
                'expirationMinutes' => $this->expirationMinutes ?? null,
                'notes' => $this->notes ?? null,
                'emailReceipt' => $this->emailReceipt,
                'unitItems' => $this->unitItems ? $this->unitItems->toArray() : null,
                'contact' => $this->contact ? $this->contact->toArray() : null
            ]
        ]);

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
