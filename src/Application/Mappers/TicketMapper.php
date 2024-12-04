<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\Ticket;
use KostasChasiotis\OctoTravel\Domain\Enums\RedemptionMethod;

/**
 * Maps raw data to a Ticket entity.
 */
class TicketMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Ticket entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Ticket The mapped Ticket entity.
     */
    public static function map(array $data): Ticket
    {
        return new Ticket(
            RedemptionMethod::from($data['redemptionMethod']),
            $data['utcRedeemedAt'] ? new DateTimeImmutable($data['utcRedeemedAt']) : null,
            DeliveryOptionsMapper::map($data['deliveryOptions'])
        );
    }
}
