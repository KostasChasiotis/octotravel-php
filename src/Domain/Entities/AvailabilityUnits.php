<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of AvailabilityUnit instances.
 * 
 * This class enforces type safety by ensuring only `AvailabilityUnit` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class AvailabilityUnits
{
    /**
     * @var AvailabilityUnit[] A list of AvailabilityUnit instances.
     */
    private array $availabilityUnits;

    /**
     * Constructor to initialize the AvailabilityUnits collection.
     * 
     * Accepts a variable number of `AvailabilityUnit` instances and stores them
     * in the container.
     * 
     * @param AvailabilityUnit ...$availabilityUnits One or more AvailabilityUnit instances.
     */
    public function __construct(AvailabilityUnit ...$availabilityUnits)
    {
        $this->availabilityUnits = $availabilityUnits;
    }

    /**
     * Retrieves all AvailabilityUnit instances stored in the collection.
     *
     * @return AvailabilityUnit[] An array of AvailabilityUnits instances.
     */
    public function getAvailabilityUnits(): array
    {
        return $this->availabilityUnits;
    }

    /**
     * Adds a new AvailabilityUnit instance to the collection.
     * 
     * This method appends the provided AvailabilityUnit instance to the existing
     * list of formats.
     * 
     * @param AvailabilityUnit $availabilityUnit The AvailabilityUnit instance to add.
     * @return void
     */
    public function add(AvailabilityUnit $availabilityUnit): void
    {
        $this->availabilityUnits[] = $availabilityUnit;
    }

    /**
     * Return the AvailabilityUnits as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(AvailabilityUnit $availabilityUnit) => $availabilityUnit->toArray(),
            $this->availabilityUnits
        );
    }
}
