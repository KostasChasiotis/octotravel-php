<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryFormat;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\DeliveryFormats;

/**
 * Maps raw data to a DeliveryFormats entity.
 */
class DeliveryFormatsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a DeliveryFormats entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return DeliveryFormats The mapped DeliveryFormats entity.
     */
    public static function map(array $data): DeliveryFormats
    {
        return new DeliveryFormats(
            ...array_map(
                fn($deliveryFormat) => DeliveryFormat::from($deliveryFormat),
                $data
            )
        );
    }
}
