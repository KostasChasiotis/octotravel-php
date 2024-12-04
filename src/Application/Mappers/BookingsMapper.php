<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Bookings;

/**
 * Maps raw data to a Bookings entity.
 */
class BookingsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Bookings entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Bookings The mapped Bookings entity.
     */
    public static function map(array $data): Bookings
    {
        return new Bookings(
            ...array_map(
                fn($booking) => BookingMapper::map($booking),
                $data
            )
        );
    }
}
