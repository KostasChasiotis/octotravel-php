<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Options;

/**
 * Maps raw data to a Options entity.
 */
class OptionsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Options entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Options The mapped Options entity.
     */
    public static function map(array $data): Options
    {
        return new Options(
            ...array_map(
                fn($option) => OptionMapper::map($option),
                $data
            )
        );
    }
}
