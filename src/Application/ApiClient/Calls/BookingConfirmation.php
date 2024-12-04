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
 * This endpoint confirms the booking so it's ready to be used.
 */
class BookingConfirmation extends OctoClient implements ApiCallInterface
{
    /**
     * @var Uuid The UUID of the booking
     */
    private Uuid $uuid;

    /**
     * @var bool Whether you want OCTO Cloud to email the guest a copy of their receipt and tickets. (defaults to false)
     */
    private bool $emailReceipt;

    /**
     * @var null|string Your reference for this booking. Also known as a Voucher Number.
     */
    private ?string $resellerReference;

    /**
     * Contact details for the main guest who will attend the tour/attraction.
     * 
     * Contact schema can be applied to both the booking object (the main reservation) 
     * or the unit object (individual ticket holders - if the supplier requires this information).
     * 
     * @var Contact
     */
    private Contact $contact;

    /**
     * An array of unit items that will be included in the booking. 
     * 
     * This allows you to provide contact details or a reseller reference for each unit item. 
     * 
     * Be careful to make sure you include ALL unit items that you also had in the original 
     * booking reservation request, if you provide more or less than in the booking reservation 
     * call this will change the number of unit items being purchased also.
     * 
     * @var BookingConfirmationUnitItems
     */
    private BookingConfirmationUnitItems $unitItems;

    private Client $client;

    public function __construct(
        Uuid $uuid,
        bool $emailReceipt,
        ?string $resellerReference,
        Contact $contact,
        BookingConfirmationUnitItems $unitItems,
        Client $client
    ) {
        $this->uuid = $uuid;
        $this->emailReceipt = $emailReceipt;
        $this->resellerReference = $resellerReference;
        $this->contact = $contact;
        $this->unitItems = $unitItems;
        $this->client = $client;
    }

    public function execute(): Booking
    {
        $response = $this->client->post('bookings/' . $this->uuid->toString() . '/confirm', [
            'json' => [
                'emailReceipt' => $this->emailReceipt,
                'resellerReference' => $this->resellerReference ?? null,
                'contact' => $this->contact->toArray(),
                'unitItems' => $this->unitItems->toArray()
            ]
        ]);

        return (BookingMapper::map(json_decode($response->getBody()->getContents(), true)));
    }
}
