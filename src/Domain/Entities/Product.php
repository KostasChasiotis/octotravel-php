<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityType;
use KostasChasiotis\OctoTravel\Domain\Enums\Locale;
use KostasChasiotis\OctoTravel\Domain\Enums\RedemptionMethod;
use KostasChasiotis\OctoTravel\Domain\Enums\TimeZone;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\DeliveryFormats;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\DeliveryMethods;

/**
 * A bookable product listed by a supplier.
 */

class Product
{
    /**
     * The id used for checking for availability and creating bookings for the product.
     * 
     * This MUST be unique within the scope of the Supplier.
     * Example "6b903d44-dc24-4ca4-ae71-6bde6c4f4854"
     * 
     * @var string $id
     */
    private string $id;

    /**
     * The name the supplier calls the product.
     * 
     * Example "Amazon River Tour"
     * 
     * @var string $internalName
     */
    private string $internalName;

    /**
     * An optional code this supplier might use to identify the product.
     * 
     * Example "AMZN"
     * 
     * @var null|string $reference
     */
    private ?string $reference;

    /**
     * A language code indicating what language this product content is in.
     * 
     * This MUST be a valid BCP 47 RFC 5646 RFC 4647 language tag.
     * 
     * Example "en-GB"
     * 
     * @var Locale $locale
     */
    private Locale $locale;

    /**
     * The IANA TimeZone name this product is located in.
     * 
     * Example "Europe/London"
     * 
     * @var TimeZone $timeZone
     */
    private TimeZone $timeZone;

    /**
     * Whether a booking can be made for this product without having to query availability first.
     * 
     * @var bool $allowFreesale
     */
    private bool $allowFreesale;

    /**
     * Whether bookings will be immediately confirmed when a sale is made, 
     * otherwise the supplier will later either accept or reject the booking.
     * 
     * When instantConfirmation is set to false one should expect created bookings to first get into a PENDING state.
     * 
     * @var bool $instantConfirmation
     */
    private bool $instantConfirmation;

    /**
     * This indicates whether the Reseller can expect immediate delivery of the customer's tickets.
     * 
     * If false then the Reseller MUST be able to delay delivery of the tickets to the customer.
     * 
     * @var bool $instantDelivery
     */
    private bool $instantDelivery;

    /**
     * Whether an availabilityId is required when creating a booking.
     * 
     * Without this the booking will be open-dated and not have a specified travel date.
     * 
     * @var bool $availabilityRequired
     */
    private bool $availabilityRequired;

    /**
     * What type of availability this product has.
     * 
     * Possible values are:
     * 
     * START_TIME if there are fixed departure times which you must pick one. Typical for day tours or activities.
     * 
     * OPENING_HOURS if you just select a date and can visit any time when the venue is open.
     * 
     * Allowed values "START_TIME" "OPENING_HOURS"
     * 
     * @var AvailabilityType $availabilityType
     */
    private AvailabilityType $availabilityType;

    /**
     * An array of formats the API will deliver the tickets as.
     * 
     * Possible values are: 
     * 
     * QRCODE A code to be presented as a QR CODE barcode 
     * 
     * CODE128A code to be presented as a CODE 128 barcode 
     * 
     * PDF_URL A URL to a PDF file which contains all the ticket details
     * 
     * @var DeliveryFormats $deliveryFormats
     */
    private DeliveryFormats $deliveryFormats;

    /**
     * How the formats described in deliveryFormats will be delivered in the booking response.
     * 
     * Possible values are:
     * 
     * TICKET: Individually per unit in the order (i.e. single ticket for each person) 
     * 
     * VOUCHER: One ticket for the whole booking
     * 
     * @var DeliveryMethods $deliveryMethods
     */
    private DeliveryMethods $deliveryMethods;

    /**
     * How the voucher can be redeemed.
     * 
     * Possible values are:
     * 
     * MANIFEST The guest name will be written down and they just need to show up 
     * 
     * DIGITAL The tickets/voucher must be scanned but can be on mobile 
     * 
     * PRINT The tickets/voucher must be printed and presented on arrival
     * 
     * @var RedemptionMethod $redemptionMethod
     */
    private RedemptionMethod $redemptionMethod;

    /**
     * An array of all options for this product.
     * 
     * All products must have at least one option.
     * 
     * @var Options $options
     */
    private Options $options;

    public function __construct(
        string $id,
        string $internalName,
        ?string $reference,
        Locale $locale,
        TimeZone $timeZone,
        bool $allowFreesale,
        bool $instantConfirmation,
        bool $instantDelivery,
        bool $availabilityRequired,
        AvailabilityType $availabilityType,
        DeliveryFormats $deliveryFormats,
        DeliveryMethods $deliveryMethods,
        RedemptionMethod $redemptionMethod,
        Options $options
    ) {
        $this->id = $id;
        $this->internalName = $internalName;
        $this->reference = $reference;
        $this->locale = $locale;
        $this->timeZone = $timeZone;
        $this->allowFreesale = $allowFreesale;
        $this->instantConfirmation = $instantConfirmation;
        $this->instantDelivery = $instantDelivery;
        $this->availabilityRequired = $availabilityRequired;
        $this->availabilityType = $availabilityType;
        $this->deliveryFormats = $deliveryFormats;
        $this->deliveryMethods = $deliveryMethods;
        $this->redemptionMethod = $redemptionMethod;
        $this->options = $options;
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
     * Get $locale
     *
     * @return Locale
     */
    public function getLocale(): Locale
    {
        return $this->locale;
    }

    /**
     * Get $timeZone
     *
     * @return TimeZone
     */
    public function getTimeZone(): TimeZone
    {
        return $this->timeZone;
    }

    /**
     * Get $allowFreesale
     *
     * @return bool
     */
    public function getAllowFreesale(): bool
    {
        return $this->allowFreesale;
    }

    /**
     * Get $instantConfirmation
     *
     * @return bool
     */
    public function getInstantConfirmation(): bool
    {
        return $this->instantConfirmation;
    }

    /**
     * Get $instantDelivery
     *
     * @return bool
     */
    public function getInstantDelivery(): bool
    {
        return $this->instantDelivery;
    }

    /**
     * Get $availabilityRequired
     *
     * @return bool
     */
    public function getAvailabilityRequired(): bool
    {
        return $this->availabilityRequired;
    }

    /**
     * Get $availabilityType
     *
     * @return AvailabilityType
     */
    public function getAvailabilityType(): AvailabilityType
    {
        return $this->availabilityType;
    }

    /**
     * Get $deliveryFormats
     *
     * @return DeliveryFormats
     */
    public function getDeliveryFormats(): DeliveryFormats
    {
        return $this->deliveryFormats;
    }

    /**
     * Get $deliveryMethods
     *
     * @return DeliveryMethods
     */
    public function getDeliveryMethods(): DeliveryMethods
    {
        return $this->deliveryMethods;
    }

    /**
     * Get $redemptionMethod
     *
     * @return RedemptionMethod
     */
    public function getRedemptionMethod(): RedemptionMethod
    {
        return $this->redemptionMethod;
    }

    /**
     * Get $options
     *
     * @return Options
     */
    public function getOptions(): Options
    {
        return $this->options;
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
            'internalName' => $this->internalName,
            'reference' => $this->reference ?? null,
            'locale' => $this->locale->value,
            'timeZone' => $this->timeZone->value,
            'allowFreesale' => $this->allowFreesale,
            'instantConfirmation' => $this->instantConfirmation,
            'instantDelivery' => $this->instantDelivery,
            'availabilityRequired' => $this->availabilityRequired,
            'availabilityType' => $this->availabilityType->value,
            'deliveryFormats' => $this->deliveryFormats->getValues(),
            'deliveryMethods' => $this->deliveryMethods->getValues(),
            'redemptionMethod' => $this->redemptionMethod->value,
            'options' => $this->options->toArray()
        ];
    }
}
