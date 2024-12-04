<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\UnitItems;

/**
 * Maps raw data to a UnitItems entity.
 */
class UnitItemsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a UnitItems entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return UnitItems The mapped UnitItems entity.
     */
    public static function map(array $data): UnitItems
    {
        return new UnitItems(
            ...array_map(
                fn($unitItem) => UnitItemMapper::map($unitItem),
                $data
            )
        );
    }
}
