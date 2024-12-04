<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * Unit restrictions
 */

class UnitRestrictions
{
    /**
     * This is the minumum age this unit can be sold to
     * 
     * @var int
     */
    private int $minAge;

    /**
     * This is the maximum age this unit can be sold to
     * 
     * @var int
     */
    private int $maxAge;

    /**
     * This is whether a form of identification will be required at redemption point (eg. student card)
     * 
     * @var bool
     */
    private bool $idRequired;

    /**
     * This is if there is a minimum amount of units to be chosen for purchase (eg. 2)
     * 
     * @var null|int
     */
    private ?int $minQuantity;

    /**
     * This is if there is a maximum amount of units to be chosen for purchase (eg. 7)
     * 
     * @var null|int
     */
    private ?int $maxQuantity;

    /**
     * This is the amount of people each unit counts as (eg. family == 4pax)
     * 
     * @var int
     */
    private int $paxCount;

    /**
     * This is if the unit needs to be accompanied by another unit (eg. Infant with Adult)
     * 
     * An array of the id of the units
     * 
     * Example "['adult_697e3ce8-1860-4cbf-80ad-95857df1f640']"
     * 
     * @var array
     */
    private array $accompaniedBy;

    public function __construct(
        int $minAge,
        int $maxAge,
        bool $idRequired,
        ?int $minQuantity,
        ?int $maxQuantity,
        int $paxCount,
        array $accompaniedBy
    ) {
        $this->minAge = $minAge;
        $this->maxAge = $maxAge;
        $this->idRequired = $idRequired;
        $this->minQuantity = $minQuantity;
        $this->maxQuantity = $maxQuantity;
        $this->paxCount = $paxCount;
        $this->accompaniedBy = $accompaniedBy;
    }

    /**
     * Get this is the minumum age this unit can be sold to
     *
     * @return int
     */
    public function getMinAge(): int
    {
        return $this->minAge;
    }

    /**
     * Get this is the maximum age this unit can be sold to
     *
     * @return int
     */
    public function getMaxAge(): int
    {
        return $this->maxAge;
    }

    /**
     * Get this is whether a form of identification will be required at redemption point (eg. student card)
     *
     * @return bool
     */
    public function getIdRequired(): bool
    {
        return $this->idRequired;
    }

    /**
     * Get this is if there is a minimum amount of units to be chosen for purchase (eg. 2)
     *
     * @return null|int
     */
    public function getMinQuantity(): ?int
    {
        return $this->minQuantity;
    }

    /**
     * Get this is if there is a maximum amount of units to be chosen for purchase (eg. 7)
     *
     * @return null|int
     */
    public function getMaxQuantity(): ?int
    {
        return $this->maxQuantity;
    }

    /**
     * Get this is the amount of people each unit counts as (eg. family == 4pax)
     *
     * @return int
     */
    public function getPaxCount(): int
    {
        return $this->paxCount;
    }

    /**
     * Get example "['adult_697e3ce8-1860-4cbf-80ad-95857df1f640']"
     *
     * @return array
     */
    public function getAccompaniedBy(): array
    {
        return $this->accompaniedBy;
    }

    /**
     * Return the UnitRestrictions as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'minAge' => $this->minAge,
            'maxAge' => $this->maxAge,
            'idRequired' => $this->idRequired,
            'minQuantity' => $this->minQuantity ?? null,
            'paxCount' => $this->paxCount,
            'accompaniedBy' => $this->accompaniedBy
        ];
    }
}
