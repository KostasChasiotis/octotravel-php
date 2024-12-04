<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\UnitItem;
use KostasChasiotis\OctoTravel\Domain\Enums\BookingStatus;

/**
 * Maps raw data to a UnitItem entity.
 */

class UnitItemMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a UnitItem entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return UnitItem The mapped UnitItem entity.
     */
    public static function map(array $data): UnitItem
    {
        return new UnitItem(
            $data['uuid'],
            $data['resellerReference'] ?? null,
            $data['supplierReference'] ?? null,
            $data['unitId'],
            UnitMapper::map($data['unit']),
            BookingStatus::from($data['status']),
            isset($data['utcRedeemedAt']) ? new DateTimeImmutable($data['utcRedeemedAt']) : null,
            ContactMapper::map($data['contact']),
            $data['ticket'] ? TicketMapper::map($data['ticket']) : null
        );
    }
}
