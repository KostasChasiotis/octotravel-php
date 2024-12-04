<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Units;

/**
 * Maps raw data to a Units entity.
 */
class UnitsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Units entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Units The mapped Units entity.
     */
    public static function map(array $data): Units
    {
        return new Units(
            ...array_map(
                fn($unit) => UnitMapper::map($unit),
                $data
            )
        );
    }
}
