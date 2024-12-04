<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityCalendar;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityStatus;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHoursArray;

/**
 * Maps raw data to a AvailabilityCalendar entity.
 */
class AvailabilityCalendarMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a AvailabilityCalendar entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return AvailabilityCalendar The mapped AvailabilityCalendar entity.
     */
    public static function map(array $data): AvailabilityCalendar
    {
        return new AvailabilityCalendar(
            new DateTimeImmutable($data['localDate']),
            $data['available'],
            AvailabilityStatus::from($data['status']),
            $data['vacancies'] ?? null,
            $data['capacity'] ?? null,
            OpeningHoursArrayMapper::map($data['openingHours'])
        );
    }
}
