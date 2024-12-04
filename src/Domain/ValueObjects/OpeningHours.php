<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use InvalidArgumentException;

/**
 * Represents a time range during which an entity (e.g., a business or service) is open.
 */
class OpeningHours
{
    /**
     * The from time of the opening hours.
     *
     * @var TimeOfDay
     */
    private TimeOfDay $from;

    /**
     * The end time of the opening hours.
     *
     * @var TimeOfDay
     */
    private TimeOfDay $to;

    /**
     * Constructor.
     *
     * @param TimeOfDay $from The starting time of the opening hours.
     * @param TimeOfDay $to   The ending time of the opening hours.
     *
     * @throws InvalidArgumentException If the start time is greater than or equal to the end time.
     */
    public function __construct(TimeOfDay $from, TimeOfDay $to)
    {
        if ($from->equals($to) || $from->__toString() > $to->__toString()) {
            throw new InvalidArgumentException(
                "Opening hours must have a start time earlier than the end time."
            );
        }

        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Factory method to create OpeningHours from strings.
     *
     * @param string $from A string representing the start time (e.g., "09:00").
     * @param string $to   A string representing the end time (e.g., "17:00").
     *
     * @throws InvalidArgumentException If the input format is invalid or start time is greater than or equal to end time.
     *
     * @return self
     */
    public static function fromStrings(string $from, string $to): self
    {
        return new self(TimeOfDay::fromString($from), TimeOfDay::fromString($to));
    }

    /**
     * Get the start time of the opening hours.
     *
     * @return TimeOfDay
     */
    public function getFrom(): TimeOfDay
    {
        return $this->from;
    }

    /**
     * Get the end time of the opening hours.
     *
     * @return TimeOfDay
     */
    public function getTo(): TimeOfDay
    {
        return $this->to;
    }

    /**
     * Check if a given time falls within the opening hours.
     *
     * @param TimeOfDay $time The time to check.
     *
     * @return bool
     */
    public function isWithinHours(TimeOfDay $time): bool
    {
        return $time->__toString() >= $this->from->__toString() &&
               $time->__toString() < $this->to->__toString();
    }

    /**
     * Convert the opening hours to a human-readable string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->from->__toString() . " - " . $this->to->__toString();
    }

    /**
     * Check if the OpeningHours object is equal to another OpeningHours object.
     *
     * @param OpeningHours $other The other OpeningHours object.
     *
     * @return bool
     */
    public function equals(OpeningHours $other): bool
    {
        return $this->from->equals($other->getFrom()) &&
               $this->to->equals($other->getTo());
    }

    /**
     * Return the OpeningHours as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'from' => $this->from->__toString(),
            'to' => $this->to->__toString()
        ];
    }
}
