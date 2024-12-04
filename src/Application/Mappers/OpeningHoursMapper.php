<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHours;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimeOfDay;

/**
 * Maps raw data to a OpeningHours entity.
 */
class OpeningHoursMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a OpeningHours entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return OpeningHours The mapped OpeningHours entity.
     */
    public static function map(array $data): OpeningHours
    {
        return new OpeningHours(
            TimeOfDay::fromString($data['from']),
            TimeOfDay::fromString($data['to'])
        );
    }
}
