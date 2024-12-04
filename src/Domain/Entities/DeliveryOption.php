<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\Enums\DeliveryFormat;

/**
 * The Delivery Option Class
 */

class DeliveryOption
{
    /**
     * The format for the delivery option.
     * 
     * @var DeliveryFormat
     */
    private DeliveryFormat $deliveryFormat;

    /**
     * The value of the delivery format.
     * 
     * @var string
     */
    private string $deliveryValue;

    public function __construct(
        DeliveryFormat $deliveryFormat,
        string $deliveryValue
    ) {
        $this->deliveryFormat = $deliveryFormat;
        $this->deliveryValue = $deliveryValue;
    }

    /**
     * Get the format for the delivery option.
     *
     * @return DeliveryFormat
     */
    public function getDeliveryFormat(): ?DeliveryFormat
    {
        return $this->deliveryFormat;
    }

    /**
     * Get the value of the delivery format.
     *
     * @return string
     */
    public function getDeliveryValue(): string
    {
        return $this->deliveryValue;
    }

    /**
     * Return the DeliveryOption as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'deliveryFormat' => $this->deliveryFormat->value,
            'deliveryValue' => $this->deliveryValue
        ];
    }
}
