<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHoursArray;

/**
 * Maps raw data to a OpeningHoursArray entity.
 */
class OpeningHoursArrayMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a OpeningHoursArray entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return OpeningHoursArray The mapped OpeningHoursArray entity.
     */
    public static function map(array $data): OpeningHoursArray
    {
        return new OpeningHoursArray(
            ...array_map(
                fn($openingHours) => OpeningHoursMapper::map($openingHours),
                $data
            )
        );
    }
}
