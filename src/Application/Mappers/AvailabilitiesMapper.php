<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Availabilities;

/**
 * Maps raw data to an Availabilities entity.
 */
class AvailabilitiesMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to an Availabilities entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Availabilities The mapped Availabilities entity.
     */
    public static function map(array $data): Availabilities
    {
        return new Availabilities(
            ...array_map(
                fn($availability) => AvailabilityMapper::map($availability),
                $data
            )
        );
    }
}
