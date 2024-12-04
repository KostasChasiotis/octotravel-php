<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Product;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityType;
use KostasChasiotis\OctoTravel\Domain\Enums\Locale;
use KostasChasiotis\OctoTravel\Domain\Enums\RedemptionMethod;
use KostasChasiotis\OctoTravel\Domain\Enums\TimeZone;

/**
 * Maps raw data to a Product entity.
 */
class ProductMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Product entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Product The mapped Product entity.
     */
    public static function map(array $data): Product
    {
        return new Product(
            $data['id'],
            $data['internalName'],
            $data['reference'],
            Locale::from($data['locale']),
            TimeZone::from($data['timeZone']),
            $data['allowFreesale'],
            $data['instantConfirmation'],
            $data['instantDelivery'],
            $data['availabilityRequired'],
            AvailabilityType::from($data['availabilityType']),
            DeliveryFormatsMapper::map($data['deliveryFormats']),
            DeliveryMethodsMapper::map($data['deliveryMethods']),
            RedemptionMethod::from($data['redemptionMethod']),
            OptionsMapper::map($data['options'])
        );
    }
}
