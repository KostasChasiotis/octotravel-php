<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryMethod;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\DeliveryMethods;

/**
 * Maps raw data to a DeliveryMethods entity.
 */
class DeliveryMethodsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a DeliveryMethods entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return DeliveryMethods The mapped DeliveryMethods entity.
     */
    public static function map(array $data): DeliveryMethods
    {
        return new DeliveryMethods(
            ...array_map(
                fn($deliveryMethod) => DeliveryMethod::from($deliveryMethod),
                $data
            )
        );
    }
}
