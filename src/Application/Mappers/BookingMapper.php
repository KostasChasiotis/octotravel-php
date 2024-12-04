<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\Enums\BookingStatus;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * Maps raw data to a Booking entity.
 */
class BookingMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Booking entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Booking The mapped Booking entity.
     */
    public static function map(array $data): Booking
    {
        return new Booking(
            $data['id'],
            new Uuid($data['uuid']),
            $data['testMode'],
            $data['resellerReference'] ?? null,
            $data['supplierReference'] ?? null,
            BookingStatus::from($data['status']),
            new DateTimeImmutable($data['utcCreatedAt']),
            isset($data['utcUpdatedAt']) ? new DateTimeImmutable($data['utcUpdatedAt']) : null,
            isset($data['utcExpiresAt']) ? new DateTimeImmutable($data['utcExpiresAt']) : null,
            isset($data['utcRedeemedAt']) ? new DateTimeImmutable($data['utcRedeemedAt']) : null,
            isset($data['utcConfirmedAt']) ? new DateTimeImmutable($data['utcConfirmedAt']) : null,
            $data['productId'],
            ProductMapper::map($data['product']),
            $data['optionId'],
            OptionMapper::map($data['option']),
            $data['cancellable'],
            $data['cancellation'] ? CancellationMapper::map($data['cancellation']) : null,
            $data['freesale'],
            $data['availabilityId'],
            AvailabilityMapper::map($data['availability']),
            ContactMapper::map($data['contact']),
            $data['notes'] ?? null,
            DeliveryMethodsMapper::map($data['deliveryMethods']),
            $data['voucher'] ? TicketMapper::map($data['voucher']) : null,
            $data['unitItems'] ? UnitItemsMapper::map($data['unitItems']) : null
        );
    }
}
