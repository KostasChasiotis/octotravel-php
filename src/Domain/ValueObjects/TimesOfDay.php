<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

/**
 * A type-safe container for managing an array of TimeOfDay instances.
 * 
 * This class enforces type safety by ensuring only `TimeOfDay` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class TimesOfDay
{
    /**
     * @var TimeOfDay[] A list of TimeOfDay instances.
     */
    private array $timesOfDay;

    /**
     * Constructor to initialize the TimeOfDay collection.
     * 
     * Accepts a variable number of `TimeOfDay` instances and stores them
     * in the container.
     * 
     * @param TimeOfDay ...$deliveryMethods One or more TimeOfDay instances.
     */
    public function __construct(TimeOfDay ...$timesOfDay)
    {
        $this->timesOfDay = $timesOfDay;
    }

    /**
     * Retrieves all TimeOfDay instances stored in the collection.
     *
     * @return TimeOfDay[] An array of TimeOfDay instances.
     */
    public function getTimesOfDay(): array
    {
        return $this->timesOfDay;
    }

    /**
     * Adds a new TimeOfDay instance to the collection.
     * 
     * This method appends the provided TimeOfDay instance to the existing
     * list of methods.
     * 
     * @param TimeOfDay $timeOfDay The TimeOfDay instance to add.
     * @return void
     */
    public function add(TimeOfDay $timeOfDay): void
    {
        $this->timesOfDay[] = $timeOfDay;
    }

    /**
     * Return the TimesOfDay as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(TimeOfDay $timeOfDay) => $timeOfDay->__toString(),
            $this->timesOfDay
        );
    }
}
