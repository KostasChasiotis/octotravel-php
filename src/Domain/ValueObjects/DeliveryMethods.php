<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryMethod;

/**
 * A type-safe container for managing an array of DeliveryMethod enum instances.
 * 
 * This class enforces type safety by ensuring only `DeliveryMethod` enum instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class DeliveryMethods
{
    /**
     * @var DeliveryMethod[] A list of DeliveryMethod enum instances.
     */
    private array $deliveryMethods;

    /**
     * Constructor to initialize the DeliveryMethods collection.
     * 
     * Accepts a variable number of `DeliveryMethods` enum instances and stores them
     * in the container.
     * 
     * @param DeliveryMethod ...$deliveryMethods One or more DeliveryMethod enum instances.
     */
    public function __construct(DeliveryMethod ...$deliveryMethods)
    {
        $this->deliveryMethods = $deliveryMethods;
    }

    /**
     * Retrieves all DeliveryMethod instances stored in the collection.
     *
     * @return DeliveryMethod[] An array of DeliveryMethod enum instances.
     */
    public function getDeliveryMethods(): array
    {
        return $this->deliveryMethods;
    }

    /**
     * Adds a new DeliveryMethod instance to the collection.
     * 
     * This method appends the provided DeliveryMethod instance to the existing
     * list of methods.
     * 
     * @param DeliveryMethod $deliveryMethod The DeliveryMethod enum instance to add.
     * @return void
     */
    public function add(DeliveryMethod $deliveryMethod): void
    {
        $this->deliveryMethods[] = $deliveryMethod;
    }

    /**
     * Retrieves the raw values of each DeliveryMethod instance in the collection.
     * 
     * This method iterates through the stored DeliveryMethod instances and extracts
     * their raw `value` properties.
     * 
     * @return string[] An array of string values representing the DeliveryMethod enums.
     */
    public function getValues(): array
    {
        $deliveryMethodValues = [];

        foreach ($this->deliveryMethods as $deliveryMethod) {
            $deliveryMethodValues[] = $deliveryMethod->value;
        }

        return $deliveryMethodValues;
    }
}
