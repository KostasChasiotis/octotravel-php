<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of Booking instances.
 * 
 * This class enforces type safety by ensuring only `Booking` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class Bookings
{
    /**
     * @var Booking[] A list of Booking instances.
     */
    private array $bookings;

    /**
     * Constructor to initialize the Bookings collection.
     * 
     * Accepts a variable number of `Booking` instances and stores them
     * in the container.
     * 
     * @param Booking ...$bookings One or more Booking instances.
     */
    public function __construct(Booking ...$bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * Retrieves all Booking instances stored in the collection.
     *
     * @return Booking[] An array of Bookings instances.
     */
    public function getBookings(): array
    {
        return $this->bookings;
    }

    /**
     * Adds a new Booking instance to the collection.
     * 
     * This method appends the provided Booking instance to the existing
     * list of formats.
     * 
     * @param Booking $booking The Booking instance to add.
     * @return void
     */
    public function add(Booking $booking): void
    {
        $this->bookings[] = $booking;
    }

    /**
     * Return the Bookings as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(Booking $booking) => $booking->toArray(),
            $this->bookings
        );
    }
}
