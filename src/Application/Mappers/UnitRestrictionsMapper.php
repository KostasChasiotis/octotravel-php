<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\UnitRestrictions;

/**
 * Maps raw data to a UnitRestrictions entity.
 */

class UnitRestrictionsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Unit entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return UnitRestrictions The mapped UnitRestrictions entity.
     */
    public static function map(array $data): UnitRestrictions
    {
        return new UnitRestrictions(
            $data['minAge'],
            $data['maxAge'],
            $data['idRequired'],
            $data['minQuantity'] ?? null,
            $data['maxQuantity'] ?? null,
            $data['paxCount'],
            $data['accompaniedBy']
        );
    }
}
