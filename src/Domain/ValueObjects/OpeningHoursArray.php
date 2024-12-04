<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

/**
 * A type-safe container for managing an array of OpeningHours instances.
 * 
 * This class enforces type safety by ensuring only `OpeningHours` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class OpeningHoursArray
{
    /**
     * @var OpeningHours[] A list of OpeningHours instances.
     */
    private array $openingHoursArray;

    /**
     * Constructor to initialize the OpeningHours collection.
     * 
     * Accepts a variable number of `OpeningHours` instances and stores them
     * in the container.
     * 
     * @param OpeningHours ...$deliveryMethods One or more OpeningHours instances.
     */
    public function __construct(OpeningHours ...$openingHoursArray)
    {
        $this->openingHoursArray = $openingHoursArray;
    }

    /**
     * Retrieves all OpeningHours instances stored in the collection.
     *
     * @return OpeningHours[] An array of OpeningHours instances.
     */
    public function getOpeningHours(): array
    {
        return $this->openingHoursArray;
    }

    /**
     * Adds a new OpeningHours instance to the collection.
     * 
     * This method appends the provided OpeningHours instance to the existing
     * list of methods.
     * 
     * @param OpeningHours $openingHours The OpeningHours instance to add.
     * @return void
     */
    public function add(OpeningHours $openingHours): void
    {
        $this->openingHoursArray[] = $openingHours;
    }


    /**
     * Return the OpeningHoursArray as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(OpeningHours $openingHours) => $openingHours->toArray(),
            $this->openingHoursArray
        );
    }
}
