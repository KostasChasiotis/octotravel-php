<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use DateTimeImmutable;
use InvalidArgumentException;

/**
 * Represents a specific time of day.
 * Immutable and type-safe.
 */
class TimeOfDay
{
    /**
     * The internal representation of the time using DateTimeImmutable.
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $time;

    /**
     * Constructor.
     *
     * @param int $hour   The hour (0-23).
     * @param int $minute The minute (0-59).
     *
     * @throws InvalidArgumentException If the provided values are out of range.
     */
    public function __construct(int $hour, int $minute)
    {
        if ($hour < 0 || $hour > 23) {
            throw new InvalidArgumentException("Hour must be between 0 and 23. Given: $hour");
        }

        if ($minute < 0 || $minute > 59) {
            throw new InvalidArgumentException("Minute must be between 0 and 59. Given: $minute");
        }

        $this->time = DateTimeImmutable::createFromFormat('H:i', sprintf('%02d:%02d', $hour, $minute));
        if ($this->time === false) {
            throw new InvalidArgumentException("Failed to create time with hour: $hour and minute: $minute.");
        }
    }

    /**
     * Factory method to create a TimeOfDay from a string.
     *
     * @param string $timeString A string in "HH:MM" format.
     *
     * @throws InvalidArgumentException If the format is invalid.
     *
     * @return self
     */
    public static function fromString(string $timeString): self
    {
        $time = DateTimeImmutable::createFromFormat('H:i', $timeString);

        if ($time === false) {
            throw new InvalidArgumentException("Invalid time format. Expected 'HH:MM', got: $timeString");
        }

        return new self((int) $time->format('H'), (int) $time->format('i'));
    }

    /**
     * Get the hour.
     *
     * @return int
     */
    public function getHour(): int
    {
        return (int) $this->time->format('H');
    }

    /**
     * Get the minute.
     *
     * @return int
     */
    public function getMinute(): int
    {
        return (int) $this->time->format('i');
    }

    /**
     * Convert the TimeOfDay to a string in "HH:MM" format.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->time->format('H:i');
    }

    /**
     * Check if this TimeOfDay is equal to another TimeOfDay.
     *
     * @param TimeOfDay $other The other TimeOfDay to compare.
     *
     * @return bool
     */
    public function equals(TimeOfDay $other): bool
    {
        return $this->time == $other->time;
    }
}
