<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of Unit instances.
 * 
 * This class enforces type safety by ensuring only `Unit` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class Units
{
    /**
     * @var Unit[] A list of Unit instances.
     */
    private array $units;

    /**
     * Constructor to initialize the Units collection.
     * 
     * Accepts a variable number of `Unit` instances and stores them
     * in the container.
     * 
     * @param Unit ...$deliveryMethods One or more Unit instances.
     */
    public function __construct(Unit ...$units)
    {
        $this->units = $units;
    }

    /**
     * Retrieves all Unit instances stored in the collection.
     *
     * @return Unit[] An array of Unit instances.
     */
    public function getUnits(): array
    {
        return $this->units;
    }

    /**
     * Adds a new Unit instance to the collection.
     * 
     * This method appends the provided Unit instance to the existing
     * list of methods.
     * 
     * @param Unit $unit The Unit instance to add.
     * @return void
     */
    public function add(Unit $unit): void
    {
        $this->units[] = $unit;
    }

    /**
     * Return the Units as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(Unit $unit) => $unit->toArray(),
            $this->units
        );
    }
}
