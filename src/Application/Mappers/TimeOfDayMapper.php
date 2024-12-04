<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimeOfDay;

/**
 * Maps raw data to an TimeOfDay entity.
 */

class TimeOfDayMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a TimeOfDay entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return TimeOfDay The mapped TimeOfDay entity.
     */
    public static function map(array $data): TimeOfDay
    {
        return new TimeOfDay(
            $data[0],
            $data[1]
        );
    }
}
