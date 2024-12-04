<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use KostasChasiotis\OctoTravel\Domain\Enums\ContactField;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\ContactFields;

/**
 * Maps raw data to a ContactFields entity.
 */
class ContactFieldsMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a ContactFields entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return ContactFields The mapped ContactFields entity.
     */
    public static function map(array $data): ContactFields
    {
        return new ContactFields(
            ...array_map(
                fn($contactField) => ContactField::from($contactField),
                $data
            )
        );
    }
}
