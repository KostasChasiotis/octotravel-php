<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use KostasChasiotis\OctoTravel\Domain\Enums\ContactField;

/**
 * A type-safe container for managing an array of ContactField enum instances.
 * 
 * This class enforces type safety by ensuring only `ContactField` enum instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class ContactFields
{
    /**
     * @var ContactField[] A list of ContactField enum instances.
     */
    private array $contactFields;

    /**
     * Constructor to initialize the ContactFields collection.
     * 
     * Accepts a variable number of `ContactField` enum instances and stores them
     * in the container.
     * 
     * @param ContactField ...$contactFields One or more ContactField enum instances.
     */
    public function __construct(ContactField ...$contactFields)
    {
        $this->contactFields = $contactFields;
    }

    /**
     * Retrieves all ContactField instances stored in the collection.
     *
     * @return ContactField[] An array of ContactField enum instances.
     */
    public function getContactFields(): array
    {
        return $this->contactFields;
    }

    /**
     * Adds a new ContactField instance to the collection.
     * 
     * This method appends the provided ContactField instance to the existing
     * list of formats.
     * 
     * @param ContactField $contactField The ContactField enum instance to add.
     * @return void
     */
    public function add(ContactField $contactField): void
    {
        $this->contactFields[] = $contactField;
    }

    /**
     * Retrieves the raw values of each ContactField instance in the collection.
     * 
     * This method iterates through the stored ContactField instances and extracts
     * their raw `value` properties.
     * 
     * @return string[] An array of string values representing the ContactField enums.
     */
    public function getValues(): array
    {
        $contactFieldValues = [];

        foreach ($this->contactFields as $contactField) {
            $contactFieldValues[] = $contactField->value;
        }

        return $contactFieldValues;
    }
}
