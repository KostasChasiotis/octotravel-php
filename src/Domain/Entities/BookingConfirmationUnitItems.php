<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of BookingConfirmationUnitItems instances.
 * 
 * This class enforces type safety by ensuring only `BookingConfirmationUnitItems` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class BookingConfirmationUnitItems
{
    /**
     * @var BookingConfirmationUnitItems[] A list of BookingConfirmationUnitItems instances.
     */
    private array $bookingConfirmationUnitItems;

    /**
     * Constructor to initialize the BookingConfirmationUnitItems collection.
     * 
     * Accepts a variable number of `BookingConfirmationUnitItem` instances and stores them
     * in the container.
     * 
     * @param BookingConfirmationUnitItem ...$bookingConfirmationUnitItems One or more BookingConfirmationUnitItem instances.
     */
    public function __construct(BookingConfirmationUnitItem ...$bookingConfirmationUnitItems)
    {
        $this->bookingConfirmationUnitItems = $bookingConfirmationUnitItems;
    }

    /**
     * Retrieves all BookingConfirmationUnitItem instances stored in the collection.
     *
     * @return BookingConfirmationUnitItem[] An array of BookingConfirmationUnitItems instances.
     */
    public function getBookingConfirmationUnitsItem(): array
    {
        return $this->bookingConfirmationUnitItems;
    }

    /**
     * Adds a new BookingConfirmationUnitItem instance to the collection.
     * 
     * This method appends the provided BookingConfirmationUnitItem instance to the existing
     * list of formats.
     * 
     * @param BookingConfirmationUnitItem $bookingConfirmationUnitsItem The BookingConfirmationUnitItem instance to add.
     * @return void
     */
    public function add(BookingConfirmationUnitItem $bookingConfirmationUnitItem): void
    {
        $this->bookingConfirmationUnitItems[] = $bookingConfirmationUnitItem;
    }

    /**
     * Return the BookingConfirmationUnitItems as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(BookingConfirmationUnitItem $bookingConfirmationUnitItem) => $bookingConfirmationUnitItem->toArray(),
            $this->bookingConfirmationUnitItems
        );
    }
}
