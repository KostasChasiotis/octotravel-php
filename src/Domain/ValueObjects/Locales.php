<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use KostasChasiotis\OctoTravel\Domain\Enums\Locale;

/**
 * A type-safe container for managing an array of Locale enum instances.
 * 
 * This class enforces type safety by ensuring only `Locale` enum instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class Locales
{
    /**
     * @var Locale[] A list of Locale enum instances.
     */
    private array $locales;

    /**
     * Constructor to initialize the Locales collection.
     * 
     * Accepts a variable number of `Locale` enum instances and stores them
     * in the container.
     * 
     * @param Locale ...$Locales One or more Locale enum instances.
     */
    public function __construct(Locale ...$locales)
    {
        $this->locales = $locales;
    }

    /**
     * Retrieves all Locale instances stored in the collection.
     *
     * @return Locale[] An array of Locale enum instances.
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    /**
     * Adds a new Locale instance to the collection.
     * 
     * This method appends the provided Locale instance to the existing
     * list of formats.
     * 
     * @param Locale $Locale The Locale enum instance to add.
     * @return void
     */
    public function add(Locale $locale): void
    {
        $this->locales[] = $locale;
    }

    /**
     * Retrieves the raw values of each Locale instance in the collection.
     * 
     * This method iterates through the stored Locale instances and extracts
     * their raw `value` properties.
     * 
     * @return string[] An array of string values representing the Locale enums.
     */
    public function getValues(): array
    {
        $localeValues = [];

        foreach ($this->locales as $locale) {
            $localeValues[] = $locale->value;
        }

        return $localeValues;
    }
}
