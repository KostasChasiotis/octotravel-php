<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of Availability instances.
 * 
 * This class enforces type safety by ensuring only `Availability` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class Availabilities
{
    /**
     * @var Availability[] A list of Availability instances.
     */
    private array $availabilities;

    /**
     * Constructor to initialize the Availabilities collection.
     * 
     * Accepts a variable number of `Availability` instances and stores them
     * in the container.
     * 
     * @param Availability ...$availabilityUnits One or more Availability instances.
     */
    public function __construct(Availability ...$availabilities)
    {
        $this->availabilities = $availabilities;
    }

    /**
     * Retrieves all Availability instances stored in the collection.
     *
     * @return Availability[] An array of Availability instances.
     */
    public function getAvailabilities(): array
    {
        return $this->availabilities;
    }

    /**
     * Adds a new Availability instance to the collection.
     * 
     * This method appends the provided Availability instance to the existing
     * list of formats.
     * 
     * @param Availability $Availability The Availability instance to add.
     * @return void
     */
    public function add(Availability $availability): void
    {
        $this->availabilities[] = $availability;
    }

    /**
     * Return the Availabilities as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(Availability $availability) => $availability->toArray(),
            $this->availabilities
        );
    }
}
