<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Unit;
use KostasChasiotis\OctoTravel\Domain\Enums\UnitType;

/**
 * Maps raw data to a Unit entity.
 */

class UnitMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Unit entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Unit The mapped Unit entity.
     */
    public static function map(array $data): Unit
    {
        return new Unit(
            $data['id'],
            $data['internalName'],
            $data['reference'] ?? null,
            UnitType::from($data['type']),
            ContactFieldsMapper::map($data['requiredContactFields']),
            UnitRestrictionsMapper::map($data['restrictions'])
        );
    }
}
