<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\AvailabilityCalendarArray;

/**
 * Maps raw data to a AvailabilityCalendarArray entity.
 */
class AvailabilityCalendarArrayMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a AvailabilityCalendarArray entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return AvailabilityCalendarArray The mapped AvailabilityCalendarArray entity.
     */
    public static function map(array $data): AvailabilityCalendarArray
    {
        return new AvailabilityCalendarArray(
            ...array_map(
                fn($availabilityCalendar) => AvailabilityCalendarMapper::map($availabilityCalendar),
                $data
            )
        );
    }
}
