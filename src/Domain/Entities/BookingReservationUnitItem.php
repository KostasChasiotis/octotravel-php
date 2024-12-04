<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * The unit items that will be included in the booking.
 */
class BookingReservationUnitItem
{
    /**
     * @var null|Uuid A unique UUID to identify the unit, same as the booking uuid except per unit.
     */
    private ?Uuid $uuid;

    /**
     * @var string The unit item unit ID.
     */
    private string $unitId;

    public function __construct(
        ?Uuid $uuid,
        string $unitId
    ) {
        $this->uuid = $uuid;
        $this->unitId = $unitId;
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
     * Return the BookingReservationUnitItem as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid ? $this->uuid->toString() : null,
            'unitId' => $this->unitId
        ];
    }
}
