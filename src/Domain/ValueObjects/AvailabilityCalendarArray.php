<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityCalendar;

/**
 * A type-safe container for managing an array of AvailabilityCalendar instances.
 * 
 * This class enforces type safety by ensuring only `AvailabilityCalendar` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class AvailabilityCalendarArray
{
    /**
     * @var AvailabilityCalendar[] A list of AvailabilityCalendar instances.
     */
    private array $availabilityCalendarArray;

    /**
     * Constructor to initialize the AvailabilityCalendar collection.
     * 
     * Accepts a variable number of `AvailabilityCalendar` instances and stores them
     * in the container.
     * 
     * @param AvailabilityCalendar ...$deliveryMethods One or more AvailabilityCalendar instances.
     */
    public function __construct(AvailabilityCalendar ...$availabilityCalendarArray)
    {
        $this->availabilityCalendarArray = $availabilityCalendarArray;
    }

    /**
     * Retrieves all AvailabilityCalendar instances stored in the collection.
     *
     * @return AvailabilityCalendar[] An array of AvailabilityCalendar instances.
     */
    public function getAvailabilityCalendarArray(): array
    {
        return $this->availabilityCalendarArray;
    }

    /**
     * Adds a new AvailabilityCalendar instance to the collection.
     * 
     * This method appends the provided AvailabilityCalendar instance to the existing
     * list of methods.
     * 
     * @param AvailabilityCalendar $availabilityCalendar The AvailabilityCalendar instance to add.
     * @return void
     */
    public function add(AvailabilityCalendar $availabilityCalendar): void
    {
        $this->availabilityCalendarArray[] = $availabilityCalendar;
    }
}
