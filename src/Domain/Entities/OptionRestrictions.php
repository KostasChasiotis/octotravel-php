<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * An object containing a fixed list of restrictions for booking the option.
 */

class OptionRestrictions
{
    /**
     * The minimum number of tickets that can be purchased in a single booking (null = 0).
     * 
     * @var null|int
     */
    private ?int $minUnits;

    /**
     * The maximum number of tickets that can be purchased in a single booking (null = unlimited).
     * 
     * @var null|int
     */
    private ?int $maxUnits;

    public function __construct(
        ?int $minUnits,
        ?int $maxUnits
    ) {
        $this->minUnits = $minUnits;
        $this->maxUnits = $maxUnits;
    }

    /**
     * Get the minimum number of tickets that can be purchased in a single booking (null = 0).
     *
     * @return null|int
     */
    public function getMinUnits(): ?int
    {
        return $this->minUnits;
    }

    /**
     * Get the maximum number of tickets that can be purchased in a single booking (null = unlimited).
     *
     * @return null|int
     */
    public function getMaxUnits(): ?int
    {
        return $this->maxUnits;
    }

    /**
     * Return the OptionRestrictions as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'minUnits' => $this->minUnits ?? null,
            'maxUnits' => $this->maxUnits ?? null
        ];
    }
}
