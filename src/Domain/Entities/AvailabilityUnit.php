<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * An availability unit, used as a call parameter.
 */

class AvailabilityUnit
{
    /**
     * The unit id
     * 
     * @var string
     */
    private string $id;

    /**
     * The quantity of the unit
     * 
     * @var int
     */
    private int $quantity;

    public function __construct(
        string $id,
        int $quantity
    ) {
        $this->id = $id;
        $this->quantity = $quantity;
    }

    /**
     * Get the unit id
     *
     * @return string
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the quantity of the unit
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Return the AvailabilityUnit as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity
        ];
    }
}
