<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityStatus;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHoursArray;

/**
 * Schema for the /avalibility/calendar endpoint.
 * 
 * For querying general open slots per day on a large range of days versus 
 * availability per departure time.
 */

class AvailabilityCalendar
{
    /**
     * A single date to query. Must be ISO 8601 compliant date.
     * 
     * Example "2022-05-12"
     * 
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $localDate;

    /**
     * Whether there is availability for this date / slot.
     * 
     * @var bool
     */
    private bool $available;

    /**
     * The status of that date.
     * 
     * @var AvailabilityStatus
     */
    private AvailabilityStatus $status;

    /**
     * This SHOULD NOT be returned when status is FREESALE. 
     * This SHOULD be a shared pool for all Unit types in the Option. 
     * 
     * If availability is tracked per-Unit then this value MUST be equal to the available quantity 
     * for the Unit that has the most remaining.
     * 
     * @var null|int
     */
    private ?int $vacancies;

    /**
     * The total capacity on this day.
     * 
     * @var null|int
     */
    private ?int $capacity;

    /**
     * A list of opening hours that the product is open on this day.
     * 
     * @var OpeningHoursArray
     */
    private OpeningHoursArray $openingHours;

    public function __construct(
        DateTimeImmutable $localDate,
        bool $available,
        AvailabilityStatus $status,
        ?int $vacancies,
        ?int $capacity,
        OpeningHoursArray $openingHours
    ) {
        $this->localDate = $localDate;
        $this->available = $available;
        $this->status = $status;
        $this->vacancies = $vacancies;
        $this->capacity = $capacity;
        $this->openingHours = $openingHours;
    }

    /**
     * Get example "2022-05-12"
     *
     * @return DateTimeImmutable
     */
    public function getLocalDate(): DateTimeImmutable
    {
        return $this->localDate;
    }

    /**
     * Get whether there is availability for this date / slot.
     *
     * @return bool
     */
    public function getAvailable(): bool
    {
        return $this->available;
    }

    /**
     * Get the status of that date.
     *
     * @return AvailabilityStatus
     */
    public function getStatus(): AvailabilityStatus
    {
        return $this->status;
    }

    /**
     * Get for the Unit that has the most remaining.
     *
     * @return null|int
     */
    public function getVacancies(): ?int
    {
        return $this->vacancies;
    }

    /**
     * Get the total capacity on this day.
     *
     * @return null|int
     */
    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    /**
     * Get a list of opening hours that the product is open on this day.
     *
     * @return OpeningHoursArray
     */
    public function getOpeningHours(): OpeningHoursArray
    {
        return $this->openingHours;
    }

    /**
     * Return the AvailabilityCalendar as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'localDate' => $this->localDate->format('c'),
            'available' => $this->available,
            'status' => $this->status->value,
            'vacancies' => $this->vacancies ?? null,
            'capacity' => $this->capacity ?? null,
            'openingHours' => $this->openingHours->toArray()
        ];
    }
}
