<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimesOfDay;

/**
 * Maps raw data to a TimesOfDay entity.
 */
class TimesOfDayMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a TimesOfDay entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return TimesOfDay The mapped TimesOfDay entity.
     */
    public static function map(array $data): TimesOfDay
    {
        return new TimesOfDay(
            ...array_map(
                fn($timeOfDay) => TimeOfDayMapper::map(explode(':', $timeOfDay)),
                $data
            )
        );
    }
}
