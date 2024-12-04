<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\Supplier;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;

/**
 * Maps raw data to a Supplier entity.
 */
class SupplierMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Supplier entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Supplier The mapped Supplier entity.
     */
    public static function map(array $data): Supplier
    {
        return new Supplier(
            $data['id'],
            $data['name'],
            new Uri($data['endpoint']),
            SupplierContactMapper::map($data['contact'])
        );
    }
}
