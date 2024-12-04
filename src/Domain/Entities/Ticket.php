<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Enums\RedemptionMethod;

/**
 * The ticket Entity
 */

class Ticket
{
    /**
     * How the voucher can be redeemed.
     * 
     * @var RedemptionMethod
     */
    private RedemptionMethod $redemptionMethod;

    /**
     * The ISO8601 date in UTC indicating when the ticket was used at the attraction.
     * 
     * @var null|DateTimeImmutable
     */
    private ?DateTimeImmutable $utcRedeemedAt;

    /**
     * An array of the different delivery options for this ticket.
     * 
     * @var DeliveryOptions
     */
    private DeliveryOptions $deliveryOptions;

    public function __construct(
        RedemptionMethod $redemptionMethod,
        ?DateTimeImmutable $utcRedeemedAt,
        DeliveryOptions $deliveryOptions
    ) {
        $this->redemptionMethod = $redemptionMethod;
        $this->utcRedeemedAt = $utcRedeemedAt;
        $this->deliveryOptions = $deliveryOptions;
    }

    /**
     * Get how the voucher can be redeemed.
     *
     * @return RedemptionMethod
     */
    public function getRedemptionMethod(): RedemptionMethod
    {
        return $this->redemptionMethod;
    }

    /**
     * Get the ISO8601 date in UTC indicating when the ticket was used at the attraction.
     *
     * @return null|DateTimeImmutable
     */
    public function getUtcRedeemedAt(): ?DateTimeImmutable
    {
        return $this->utcRedeemedAt;
    }

    /**
     * Get an array of the different delivery options for this ticket.
     *
     * @return DeliveryOptions
     */
    public function getDeliveryOptions(): DeliveryOptions
    {
        return $this->deliveryOptions;
    }

    /**
     * Return the Ticket as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'redemptionMethod' => $this->redemptionMethod->value,
            'utcRedeemedAt' => $this->utcRedeemedAt ? $this->utcRedeemedAt->format('c') : null,
            'deliveryOptions' => $this->deliveryOptions->toArray()
        ];
    }
}
