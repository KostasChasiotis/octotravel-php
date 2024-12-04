<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Products;

/**
 * Maps raw data to a Products entity.
 */
class ProductsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Products entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Products The mapped Products entity.
     */
    public static function map(array $data): Products
    {
        return new Products(
            ...array_map(
                fn($product) => ProductMapper::map($product),
                $data
            )
        );
    }
}
