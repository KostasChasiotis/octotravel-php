<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of Option instances.
 * 
 * This class enforces type safety by ensuring only `Option` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class Options
{
    /**
     * @var Option[] A list of Option instances.
     */
    private array $options;

    /**
     * Constructor to initialize the Option collection.
     * 
     * Accepts a variable number of `Option` instances and stores them
     * in the container.
     * 
     * @param Option ...$deliveryMethods One or more Option instances.
     */
    public function __construct(Option ...$options)
    {
        $this->options = $options;
    }

    /**
     * Retrieves all Option instances stored in the collection.
     *
     * @return Option[] An array of Option instances.
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Adds a new Option instance to the collection.
     * 
     * This method appends the provided Option instance to the existing
     * list of methods.
     * 
     * @param Option $option The Option instance to add.
     * @return void
     */
    public function add(Option $option): void
    {
        $this->options[] = $option;
    }

    /**
     * Return the Options as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(Option $option) => $option->toArray(),
            $this->options
        );
    }
}
