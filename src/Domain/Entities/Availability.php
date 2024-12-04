<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityStatus;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHoursArray;

/**
 * The availability object that was booked.
 */

class Availability
{
    /**
     * The availability id, you'll need this when booking. 
     * 
     * MUST be a unique identifier within the scope of an option.
     * 
     * @var string
     */
    private string $id;

    /**
     * The start time for this availability. This will be in the local time zone of the product. 
     * 
     * Must be an ISO 8601 compliant date and time.
     * 
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $localDateTimeStart;

    /**
     * The end time for this availability. This will be in the local time zone of the product. 
     * 
     * Must be an ISO 8601 compliant date and time.
     * 
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $localDateTimeEnd;

    /**
     * A boolean field indicating whether this is an all day availability and not a fixed departure time.
     * 
     * If this value is true then there will be no other availability object on the same day.
     * 
     * @var bool
     */
    private bool $allDay;

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
     * Maximum number of units that can be sold within one booking on this day / slot.
     * 
     * @var null|int
     */
    private ?int $maxUnits;

    /**
     * The time by which the booking must be confirmed at
     * 
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $utcCutoffAt;

    /**
     * A list of opening hours that the product is open on this day.
     * 
     * @var OpeningHoursArray
     */
    private OpeningHoursArray $openingHours;

    public function __construct(
        string $id,
        DateTimeImmutable $localDateTimeStart,
        DateTimeImmutable $localDateTimeEnd,
        bool $allDay,
        bool $available,
        AvailabilityStatus $status,
        ?int $vacancies,
        ?int $capacity,
        ?int $maxUnits,
        DateTimeImmutable $utcCutoffAt,
        OpeningHoursArray $openingHours
    ) {
        $this->id = $id;
        $this->localDateTimeStart = $localDateTimeStart;
        $this->localDateTimeEnd = $localDateTimeEnd;
        $this->allDay = $allDay;
        $this->available = $available;
        $this->status = $status;
        $this->vacancies = $vacancies;
        $this->capacity = $capacity;
        $this->maxUnits = $maxUnits;
        $this->utcCutoffAt = $utcCutoffAt;
        $this->openingHours = $openingHours;
    }

    /**
     * Get mUST be a unique identifier within the scope of an option.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get must be an ISO 8601 compliant date and time.
     *
     * @return DateTimeImmutable
     */
    public function getLocalDateTimeStart(): DateTimeImmutable
    {
        return $this->localDateTimeStart;
    }

    /**
     * Get must be an ISO 8601 compliant date and time.
     *
     * @return DateTimeImmutable
     */
    public function getLocalDateTimeEnd(): DateTimeImmutable
    {
        return $this->localDateTimeEnd;
    }

    /**
     * Get if this value is true then there will be no other availability object on the same day.
     *
     * @return bool
     */
    public function getAllDay(): bool
    {
        return $this->allDay;
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
     * Get maximum number of units that can be sold within one booking on this day / slot.
     *
     * @return null|int
     */
    public function getMaxUnits(): ?int
    {
        return $this->maxUnits;
    }

    /**
     * Get the time by which the booking must be confirmed at
     *
     * @return DateTimeImmutable
     */
    public function getUtcCutoffAt(): DateTimeImmutable
    {
        return $this->utcCutoffAt;
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
     * Return the Availability as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'localDateTimeStart' => $this->localDateTimeStart->format('c'),
            'localDateTimeEnd' => $this->localDateTimeEnd->format('c'),
            'allDay' => $this->allDay,
            'available' => $this->available,
            'status' => $this->status->value,
            'vacancies' => $this->vacancies ?? null,
            'capacity' => $this->capacity ?? null,
            'maxUnits' => $this->maxUnits ?? null,
            'utcCutoffAt' => $this->utcCutoffAt->format('c'),
            'openingHours' => $this->openingHours->toArray()
        ];
    }
}
