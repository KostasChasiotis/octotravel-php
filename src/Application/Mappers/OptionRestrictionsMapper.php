<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\OptionRestrictions;

/**
 * Maps raw data to an OptionRestrictions entity.
 */

class OptionRestrictionsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a OptionRestrictions entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return OptionRestrictions The mapped OptionRestrictions entity.
     */
    public static function map(array $data): OptionRestrictions
    {
        return new OptionRestrictions(
            $data['minUnits'] ?? null,
            $data['maxUnits'] ?? null
        );
    }
}
