<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\Contact;
use KostasChasiotis\OctoTravel\Domain\Enums\Country;
use KostasChasiotis\OctoTravel\Domain\Enums\Locale;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Locales;

/**
 * Maps raw data to a Contact entity.
 */
class ContactMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Contact entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Contact The mapped Contact entity.
     */
    public static function map(array $data): Contact
    {
        return new Contact(
            $data['fullName'] ?? null,
            $data['firstName'] ?? null,
            $data['lastName'] ?? null,
            $data['emailAddress'] ? new Email($data['emailAddress']) : null,
            $data['phoneNumber'] ?? null,
            new Locales(
                ...array_map(
                    fn($locale) => Locale::from($locale),
                    $data['locales']
                )
            ) ?? null,
            $data['postalCode'] ?? null,
            $data['country'] ? Country::from($data['country']) : null,
            $data['notes']
        );
    }
}
