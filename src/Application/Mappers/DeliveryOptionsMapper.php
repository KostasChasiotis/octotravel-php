<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\DeliveryOptions;

/**
 * Maps raw data to a DeliveryOptions entity.
 */
class DeliveryOptionsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a DeliveryOptions entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return DeliveryOptions The mapped DeliveryOptions entity.
     */
    public static function map(array $data): DeliveryOptions
    {
        return new DeliveryOptions(
            ...array_map(
                fn($deliveryOption) => DeliveryOptionMapper::map($deliveryOption),
                $data
            )
        );
    }
}
