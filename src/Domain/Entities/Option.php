<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\Enums\DurationUnit;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\ContactFields;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimesOfDay;

/**
 * Product options are subdivisions of the original product that will affect price and / or duration. Within the OCTo spec, every product must contain an option.
 */

class Option
{
    /**
     * The id that identifies this option, it is only unique within the product.
     * 
     * Example "DEFAULT"
     * 
     * @var string $id
     */
    private string $id;

    /**
     * TRUE identifies the option as default, and should therefore rendered and selected first
     * 
     * @var bool $default
     */
    private bool $default;

    /**
     * The name the supplier calls the option by.
     * 
     * Example "Private Morning Tour"
     * 
     * @var string $internalName
     */
    private string $internalName;

    /**
     * An optional code this supplier might use to identify the product.
     * 
     * Example "VIP-MORN"
     * 
     * @var null|string $reference
     */
    private ?string $reference;

    /**
     * This will be an array of all possible start times that can be returned during availability.
     * 
     * For example an all day attraction may have a single value like ["00:00"]
     * whilst a tour with multiple departure times may have multiple:["09:00", "14:00", "17:00"].
     * 
     * @var TimesOfDay $availabilityLocalStartTimes
     */
    private TimesOfDay $availabilityLocalStartTimes;

    /**
     * This is how long before the tour the booking can be still be cancelled.
     * 
     * Example "1 hour"
     * 
     * @var string $cancellationCutoff
     */
    private string $cancellationCutoff;

    /**
     * The numeric amount for the cutoff.
     * 
     * Example "1"
     * 
     * @var int $cancellationCutoffAmount
     */
    private int $cancellationCutoffAmount;

    /**
     * Time units used to determine duration.
     * 
     * Three values are available: hour, minute, day.
     * 
     * Allowed values "hour" "minute" "day"
     * 
     * @var DurationUnit $cancellationCutoffUnit
     */
    private DurationUnit $cancellationCutoffUnit;

    /**
     * An array of the contact fields required to confirm a booking.
     * 
     * These just apply to the lead traveller on the booking and not for every ticket.
     * 
     * Allowed values "firstName" "lastName" "emailAddress" "phoneNumber" "country" "notes" "locales"
     * 
     * @var ContactFields $requiredContactFields
     */
    private ContactFields $requiredContactFields;

    /**
     * An object containing a fixed list of restrictions for booking the option
     * 
     * @var OptionRestrictions $restrictions
     */
    private OptionRestrictions $restrictions;

    /**
     * The list of ticket types (units) available for sale.
     * 
     * @var Units $units
     */
    private Units $units;

    public function __construct(
        string $id,
        bool $default,
        string $internalName,
        ?string $reference,
        TimesOfDay $availabilityLocalStartTimes,
        string $cancellationCutoff,
        int $cancellationCutoffAmount,
        DurationUnit $cancellationCutoffUnit,
        ContactFields $requiredContactFields,
        OptionRestrictions $restrictions,
        Units $units
    ) {
        $this->id = $id;
        $this->default = $default;
        $this->internalName = $internalName;
        $this->reference = $reference;
        $this->availabilityLocalStartTimes = $availabilityLocalStartTimes;
        $this->cancellationCutoff = $cancellationCutoff;
        $this->cancellationCutoffAmount = $cancellationCutoffAmount;
        $this->cancellationCutoffUnit = $cancellationCutoffUnit;
        $this->requiredContactFields = $requiredContactFields;
        $this->restrictions = $restrictions;
        $this->units = $units;
    }

    /**
     * Get $id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get $default
     *
     * @return bool
     */
    public function getDefault(): bool
    {
        return $this->default;
    }

    /**
     * Get $internalName
     *
     * @return string
     */
    public function getInternalName(): string
    {
        return $this->internalName;
    }

    /**
     * Get $reference
     *
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Get $availabilityLocalStartTimes
     *
     * @return TimesOfDay
     */
    public function getAvailabilityLocalStartTimes(): TimesOfDay
    {
        return $this->availabilityLocalStartTimes;
    }

    /**
     * Get $cancellationCutoff
     *
     * @return string
     */
    public function getCancellationCutoff(): string
    {
        return $this->cancellationCutoff;
    }

    /**
     * Get $cancellationCutoffAmount
     *
     * @return int
     */
    public function getCancellationCutoffAmount(): int
    {
        return $this->cancellationCutoffAmount;
    }

    /**
     * Get $cancellationCutoffUnit
     *
     * @return DurationUnit
     */
    public function getCancellationCutoffUnit(): DurationUnit
    {
        return $this->cancellationCutoffUnit;
    }

    /**
     * Get $requiredContactFields
     *
     * @return ContactFields
     */
    public function getRequiredContactFields(): ContactFields
    {
        return $this->requiredContactFields;
    }

    /**
     * Get $restrictions
     *
     * @return OptionRestrictions
     */
    public function getRestrictions(): OptionRestrictions
    {
        return $this->restrictions;
    }

    /**
     * Get $units
     *
     * @return Units
     */
    public function getUnits(): Units
    {
        return $this->units;
    }

    /**
     * Return the Booking as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'default' => $this->default,
            'internalName' => $this->internalName,
            'reference' => $this->reference ?? null,
            'availabilityLocalStartTimes' => $this->availabilityLocalStartTimes->toArray(),
            'cancellationCutoff' => $this->cancellationCutoff,
            'cancellationCutoffAmount' => $this->cancellationCutoffAmount,
            'cancellationCutoffUnit' => $this->cancellationCutoffUnit->value,
            'requiredContactFields' => $this->requiredContactFields->getValues(),
            'restrictions' => $this->restrictions->toArray(),
            'units' => $this->units->toArray()
        ];
    }
}
