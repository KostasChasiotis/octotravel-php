<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of BookingReservationUnitItems instances.
 * 
 * This class enforces type safety by ensuring only `BookingReservationUnitItems` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class BookingReservationUnitItems
{
    /**
     * @var BookingReservationUnitItems[] A list of BookingReservationUnitItems instances.
     */
    private array $bookingReservationUnitItems;

    /**
     * Constructor to initialize the BookingReservationUnitItems collection.
     * 
     * Accepts a variable number of `BookingReservationUnitItem` instances and stores them
     * in the container.
     * 
     * @param BookingReservationUnitItem ...$bookingReservationUnitItems One or more BookingReservationUnitItem instances.
     */
    public function __construct(BookingReservationUnitItem ...$bookingReservationUnitItems)
    {
        $this->bookingReservationUnitItems = $bookingReservationUnitItems;
    }

    /**
     * Retrieves all BookingReservationUnitItem instances stored in the collection.
     *
     * @return BookingReservationUnitItem[] An array of BookingReservationUnitItems instances.
     */
    public function getBookingReservationUnitsItem(): array
    {
        return $this->bookingReservationUnitItems;
    }

    /**
     * Adds a new BookingReservationUnitItem instance to the collection.
     * 
     * This method appends the provided BookingReservationUnitItem instance to the existing
     * list of formats.
     * 
     * @param BookingReservationUnitItem $bookingReservationUnitsItem The BookingReservationUnitItem instance to add.
     * @return void
     */
    public function add(BookingReservationUnitItem $bookingReservationUnitItem): void
    {
        $this->bookingReservationUnitItems[] = $bookingReservationUnitItem;
    }

    /**
     * Return the BookingReservationUnitItems as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(BookingReservationUnitItem $bookingReservationUnitItem) => $bookingReservationUnitItem->toArray(),
            $this->bookingReservationUnitItems
        );
    }
}
