<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of DeliveryOption instances.
 * 
 * This class enforces type safety by ensuring only `DeliveryOption` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class DeliveryOptions
{
    /**
     * @var DeliveryOption[] A list of DeliveryOption instances.
     */
    private array $deliveryOptions;

    /**
     * Constructor to initialize the DeliveryOptions collection.
     * 
     * Accepts a variable number of `DeliveryOption` instances and stores them
     * in the container.
     * 
     * @param DeliveryOption ...$deliveryOptions One or more DeliveryOption instances.
     */
    public function __construct(DeliveryOption ...$deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
    }

    /**
     * Retrieves all DeliveryOption instances stored in the collection.
     *
     * @return DeliveryOption[] An array of DeliveryOption instances.
     */
    public function getDeliveryOptions(): array
    {
        return $this->deliveryOptions;
    }

    /**
     * Adds a new DeliveryOption instance to the collection.
     * 
     * This method appends the provided DeliveryOption instance to the existing
     * list of formats.
     * 
     * @param DeliveryOption $deliveryOption The DeliveryOption instance to add.
     * @return void
     */
    public function add(DeliveryOption $deliveryOption): void
    {
        $this->deliveryOptions[] = $deliveryOption;
    }

    /**
     * Return the DeliveryOptions as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(DeliveryOption $deliveryOption) => $deliveryOption->toArray(),
            $this->deliveryOptions
        );
    }
}
