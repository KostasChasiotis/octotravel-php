<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\Enums\UnitType;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\ContactFields;

/**
 * The ticket types (units) available for sale.
 */

class Unit
{
    /**
     * This MUST be a unique identifier within the scope of the option.
     * 
     * @var string
     */
    private string $id;

    /**
     * This should be a name to help with identifying the unit. It should NOT be shown to the customer.
     * 
     * @var string
     */
    private string $internalName;

    /**
     * This is an internal reference identifier that the Supplier wishes to use. It MAY be non-unique.
     * 
     * @var null|string
     */
    private ?string $reference;

    /**
     * This is the base unit type for this unit definition.
     * 
     * A value of TRAVELLER MUST only be used in replacement of ADULT, CHILD, INFANT, YOUTH, STUDENT, or SENIOR.
     * 
     * @var UnitType
     */
    private UnitType $type;

    /**
     * This is the array of the contact information PER ticket that the supplier expects.
     * 
     * @var ContactFields
     */
    private ContactFields $requiredContactFields;

    /**
     * Unit restrictions
     * 
     * @var UnitRestrictions
     */
    private UnitRestrictions $restirctions;

    public function __construct(
        string $id,
        string $internalName,
        ?string $reference,
        UnitType $type,
        ContactFields $requiredContactFields,
        UnitRestrictions $restirctions
    ) {
        $this->id = $id;
        $this->internalName = $internalName;
        $this->reference = $reference;
        $this->type = $type;
        $this->requiredContactFields = $requiredContactFields;
        $this->restirctions = $restirctions;
    }

    /**
     * Get this MUST be a unique identifier within the scope of the option.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get this should be a name to help with identifying the unit. It should NOT be shown to the customer.
     *
     * @return string
     */
    public function getInternalName(): string
    {
        return $this->internalName;
    }

    /**
     * Get this is an internal reference identifier that the Supplier wishes to use. It MAY be non-unique.
     *
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Get a value of TRAVELLER MUST only be used in replacement of ADULT, CHILD, INFANT, YOUTH, STUDENT, or SENIOR.
     *
     * @return UnitType
     */
    public function getType(): UnitType
    {
        return $this->type;
    }

    /**
     * Get this is the array of the contact information PER ticket that the supplier expects.
     *
     * @return ContactFields
     */
    public function getRequiredContactFields(): ContactFields
    {
        return $this->requiredContactFields;
    }

    /**
     * Get unit restrictions
     *
     * @return UnitRestrictions
     */
    public function getRestirctions(): UnitRestrictions
    {
        return $this->restirctions;
    }

    /**
     * Return the Unit as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'internalName' => $this->internalName,
            'reference' => $this->reference ?? null,
            'type' => $this->type->value,
            'requiredContactFields' => $this->requiredContactFields->getValues(),
            'restrictions' => $this->restirctions->toArray()
        ];
    }
}
