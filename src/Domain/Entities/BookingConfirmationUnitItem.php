<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * The unit items that will be included in the booking.
 */
class BookingConfirmationUnitItem
{
    /**
     * @var null|Uuid A unique UUID to identify the unit, same as the booking uuid except per unit.
     */
    private ?Uuid $uuid;

    /**
     * @var string The unit item unit ID.
     */
    private string $unitId;

    /**
     * @var null|string A reference the reseller uses to identify the unit within all bookings.
     */
    private ?string $resellerReference;

    /**
     * Contact schema can be applied to both the booking object (the main reservation) or the unit object 
     * (individual ticket holders - if the supplier requires this information).

     * @var null|Contact Contact details for the main guest who will attend the tour/attraction.
     */
    private ?Contact $contact;

    public function __construct(
        ?Uuid $uuid,
        string $unitId,
        ?string $resellerReference,
        ?Contact $contact
    ) {
        $this->uuid = $uuid;
        $this->unitId = $unitId;
        $this->resellerReference = $resellerReference;
        $this->contact = $contact;
    }

    /**
     * Get a unique UUID to identify the unit, same as the booking uuid except per unit.
     *
     * @return null|Uuid
     */ 
    public function getUuid(): ?Uuid
    {
        return $this->uuid;
    }

    /**
     * Get the unit item unit ID.
     *
     * @return string
     */ 
    public function getUnitId(): string
    {
        return $this->unitId;
    }

    /**
     * Get a reference the reseller uses to identify the unit within all bookings.
     *
     * @return null|string
     */
    public function getResellerReference(): ?string
    {
        return $this->resellerReference;
    }

    /**
     * Get contact details for the main guest who will attend the tour/attraction.
     *
     * @return null|Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Return the BookingConfirmationUnitItem as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid ? $this->uuid->toString() : null,
            'unitId' => $this->unitId,
            'resellerReference' => $this->resellerReference ?? null,
            'contact' => $this->contact ? $this->contact->toArray() : null
        ];
    }
}
