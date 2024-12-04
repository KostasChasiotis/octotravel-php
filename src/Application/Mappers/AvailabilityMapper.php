<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\Availability;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityStatus;

/**
 * Maps raw data to a Availability entity.
 */
class AvailabilityMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Availability entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return null|Availability The mapped Availability entity.
     */
    public static function map(array $data): mixed
    {
        return $data ? new Availability(
            $data['id'],
            new DateTimeImmutable($data['localDateTimeStart']),
            new DateTimeImmutable($data['localDateTimeEnd']),
            $data['allDay'],
            $data['available'],
            AvailabilityStatus::from($data['status']),
            $data['vacancies'] ?? null,
            $data['capacity'] ?? null,
            $data['maxUnits'] ?? null,
            new DateTimeImmutable($data['utcCutoffAt']),
            OpeningHoursArrayMapper::map($data['openingHours'])
        ) : null;
    }
}
