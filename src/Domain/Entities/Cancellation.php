<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Enums\Refund;

/**
 * An object with information about why and when the booking was cancelled.
 */

class Cancellation
{
    /**
     * Whether the booking was refunded as part of the cancellation.
     * 
     * @var Refund
     */
    private Refund $refund;

    /**
     * A text value describing why the cancellation happened.
     * 
     * @var null|string
     */
    private ?string $reason;

    /**
     * An ISO8601 date time in UTC indicating when the booking was cancelled.
     * 
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $utcCancelledAt;

    public function __construct(
        Refund $refund,
        ?string $reason,
        DateTimeImmutable $utcCancelledAt
    ) {
        $this->refund = $refund;
        $this->reason = $reason;
        $this->utcCancelledAt = $utcCancelledAt;
    }

    /**
     * Get whether the booking was refunded as part of the cancellation.
     *
     * @return Refund
     */
    public function getRefund(): Refund
    {
        return $this->refund;
    }

    /**
     * Get a text value describing why the cancellation happened.
     *
     * @return null|string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Get an ISO8601 date time in UTC indicating when the booking was cancelled.
     *
     * @return DateTimeImmutable
     */
    public function getUtcCancelledAt(): DateTimeImmutable
    {
        return $this->utcCancelledAt;
    }

    /**
     * Return the Cancellation as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'refund' => $this->refund->value,
            'reason' => $this->reason ?? null,
            'utcCancelledAt' => $this->utcCancelledAt->format('c')
        ];
    }
}
