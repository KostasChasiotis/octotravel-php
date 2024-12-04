<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of UnitItem instances.
 * 
 * This class enforces type safety by ensuring only `UnitItem` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored methods and their respective values.
 */
class UnitItems
{
    /**
     * @var UnitItem[] A list of UnitItem instances.
     */
    private array $unitItems;

    /**
     * Constructor to initialize the UnitItems collection.
     * 
     * Accepts a variable number of `UnitItem` instances and stores them
     * in the container.
     * 
     * @param UnitItem ...$deliveryMethods One or more UnitItem instances.
     */
    public function __construct(UnitItem ...$unitItems)
    {
        $this->unitItems = $unitItems;
    }

    /**
     * Retrieves all UnitItem instances stored in the collection.
     *
     * @return UnitItem[] An array of UnitItem instances.
     */
    public function getUnitItems(): array
    {
        return $this->unitItems;
    }

    /**
     * Adds a new UnitItem instance to the collection.
     * 
     * This method appends the provided UnitItem instance to the existing
     * list of methods.
     * 
     * @param UnitItem $unitItem The UnitItem instance to add.
     * @return void
     */
    public function add(UnitItem $unitItem): void
    {
        $this->unitItems[] = $unitItem;
    }

    /**
     * Return the UnitItem as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(UnitItem $unitItem) => $unitItem->toArray(),
            $this->unitItems
        );
    }
}
