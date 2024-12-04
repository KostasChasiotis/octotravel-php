<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Enums\BookingStatus;

class UnitItem
{
    /**
     * @var string
     */
    private string $uuid;

    /**
     * @var null|string
     */
    private ?string $resellerReference;

    /**
     * @var null|string
     */
    private ?string $supplierReference;

    /**
     * @var string
     */
    private string $unitId;

    /**
     * @var Unit
     */
    private Unit $unit;

    /**
     * @var BookingStatus
     */
    private BookingStatus $status;

    /**
     * @var null|DateTimeImmutable
     */
    private ?DateTimeImmutable $utcRedeemedAt;

    /**
     * @var Contact
     */
    private Contact $contact;

    /**
     * @var null|Ticket
     */
    private ?Ticket $ticket;

    public function __construct(
        string $uuid,
        ?string $resellerReference,
        ?string $supplierReference,
        string $unitId,
        Unit $unit,
        BookingStatus $status,
        ?DateTimeImmutable $utcRedeemedAt,
        Contact $contact,
        ?Ticket $ticket
    ) {
        $this->uuid = $uuid;
        $this->resellerReference = $resellerReference;
        $this->supplierReference = $supplierReference;
        $this->unitId = $unitId;
        $this->unit = $unit;
        $this->status = $status;
        $this->utcRedeemedAt = $utcRedeemedAt;
        $this->contact = $contact;
        $this->ticket = $ticket;
    }

    /**
     * Get the value of uuid
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * Get the value of resellerReference
     *
     * @return null|string
     */
    public function getResellerReference(): ?string
    {
        return $this->resellerReference;
    }

    /**
     * Get the value of supplierReference
     *
     * @return null|string
     */
    public function getSupplierReference(): ?string
    {
        return $this->supplierReference;
    }

    /**
     * Get the value of unitId
     *
     * @return string
     */
    public function getUnitId(): string
    {
        return $this->unitId;
    }

    /**
     * Get the value of unit
     *
     * @return Unit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }

    /**
     * Get the value of status
     *
     * @return BookingStatus
     */
    public function getStatus(): BookingStatus
    {
        return $this->status;
    }

    /**
     * Get the value of utcRedeemedAt
     *
     * @return null|DateTimeImmutable
     */
    public function getUtcRedeemedAt(): ?DateTimeImmutable
    {
        return $this->utcRedeemedAt;
    }

    /**
     * Get the value of contact
     *
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * Get the value of ticket
     *
     * @return null|Ticket
     */
    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    /**
     * Return the UnitItem as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'resellerReference' => $this->resellerReference ?? null,
            'supplierReference' => $this->supplierReference ?? null,
            'unitId' => $this->unitId,
            'unit' => $this->unit->toArray(),
            'status' => $this->status->value,
            'utcRedeemedAt' => $this->utcRedeemedAt ? $this->utcRedeemedAt->format('c') : null,
            'contact' => $this->contact->toArray(),
            'ticket' => $this->ticket ? $this->ticket->toArray() : null
        ];
    }
}
