<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Option;
use KostasChasiotis\OctoTravel\Domain\Enums\DurationUnit;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimeOfDay;

/**
 * Maps raw data to an Option entity.
 */

class OptionMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Option entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Option The mapped Option entity.
     */
    public static function map(array $data): Option
    {
        return new Option(
            $data['id'],
            $data['default'],
            $data['internalName'],
            $data['reference'] ?? null,
            TimesOfDayMapper::map($data['availabilityLocalStartTimes']),
            $data['cancellationCutoff'],
            $data['cancellationCutoffAmount'],
            DurationUnit::from($data['cancellationCutoffUnit']),
            ContactFieldsMapper::map($data['requiredContactFields']),
            OptionRestrictionsMapper::map($data['restrictions']),
            UnitsMapper::map($data['units'])
        );
    }
}
