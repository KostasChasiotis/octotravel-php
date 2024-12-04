<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\DeliveryOption;
use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryFormat;

/**
 * Maps raw data to a DeliveryOption entity.
 */
class DeliveryOptionMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a DeliveryOption entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return DeliveryOption The mapped DeliveryOption entity.
     */
    public static function map(array $data): DeliveryOption
    {
        return new DeliveryOption(
            DeliveryFormat::from($data['deliveryFormat']),
            $data['deliveryValue']
        );
    }
}
