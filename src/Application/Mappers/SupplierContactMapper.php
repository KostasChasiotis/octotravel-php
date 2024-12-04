<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Entities\SupplierContact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;

/**
 * Maps raw data to a SupplierContact entity.
 */
class SupplierContactMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a SupplierContact entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return SupplierContact The mapped SupplierContact entity.
     */
    public static function map(array $data): SupplierContact
    {
        return new SupplierContact(
            isset($data['website']) ? new Uri($data['website']) : null,
            isset($data['email']) ? new Email($data['email']) : null,
            $data['telephone'] ?? null,
            $data['address'] ?? null
        );
    }
}
