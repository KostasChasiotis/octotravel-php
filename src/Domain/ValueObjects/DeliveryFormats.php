<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryFormat;

/**
 * A type-safe container for managing an array of DeliveryFormat enum instances.
 * 
 * This class enforces type safety by ensuring only `DeliveryFormat` enum instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class DeliveryFormats
{
    /**
     * @var DeliveryFormat[] A list of DeliveryFormat enum instances.
     */
    private array $deliveryFormats;

    /**
     * Constructor to initialize the DeliveryFormats collection.
     * 
     * Accepts a variable number of `DeliveryFormat` enum instances and stores them
     * in the container.
     * 
     * @param DeliveryFormat ...$deliveryFormats One or more DeliveryFormat enum instances.
     */
    public function __construct(DeliveryFormat ...$deliveryFormats)
    {
        $this->deliveryFormats = $deliveryFormats;
    }

    /**
     * Retrieves all DeliveryFormat instances stored in the collection.
     *
     * @return DeliveryFormat[] An array of DeliveryFormat enum instances.
     */
    public function getDeliveryFormats(): array
    {
        return $this->deliveryFormats;
    }

    /**
     * Adds a new DeliveryFormat instance to the collection.
     * 
     * This method appends the provided DeliveryFormat instance to the existing
     * list of formats.
     * 
     * @param DeliveryFormat $deliveryFormat The DeliveryFormat enum instance to add.
     * @return void
     */
    public function add(DeliveryFormat $deliveryFormat): void
    {
        $this->deliveryFormats[] = $deliveryFormat;
    }

    /**
     * Retrieves the raw values of each DeliveryFormat instance in the collection.
     * 
     * This method iterates through the stored DeliveryFormat instances and extracts
     * their raw `value` properties.
     * 
     * @return string[] An array of string values representing the DeliveryFormat enums.
     */
    public function getValues(): array
    {
        $deliveryFormatValues = [];

        foreach ($this->deliveryFormats as $deliveryFormat) {
            $deliveryFormatValues[] = $deliveryFormat->value;
        }

        return $deliveryFormatValues;
    }
}
