<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;

/**
 * Contact details for the guests that will attend the tour/attraction.
 * 
 * Contact schema can be applied to both the booking object (the main reservation) or the unit object (individual ticket holders - if the supplier requires this information)
 */

class SupplierContact
{
    /**
     * Unique identifier used in the platform to represent the supplier.
     * 
     * @var null|Uri
     */
    private ?Uri $website;

    /**
     * The email support contact for the Supplier.
     * 
     * @var null|Email
     */
    private ?Email $email;

    /**
     * The phone support contact for the Supplier.
     * 
     * @var null|string
     */
    private ?string $telephone;

    /**
     * The (snail) mail address support contact for the Supplier.
     * 
     * @var null|string
     */
    private ?string $address;

    public function __construct(
        ?Uri $website,
        ?Email $email,
        ?string $telephone,
        ?string $address
    ) {
        $this->website = $website;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->address = $address;
    }

    /**
     * Get unique identifier used in the platform to represent the supplier.
     *
     * @return null|Uri
     */
    public function getWebsite(): ?Uri
    {
        return $this->website;
    }

    /**
     * Get the email support contact for the Supplier.
     *
     * @return null|Email
     */
    public function getEmail(): ?Email
    {
        return $this->email;
    }

    /**
     * Get the phone support contact for the Supplier.
     *
     * @return null|string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Get the (snail) mail address support contact for the Supplier.
     *
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Return the SupplierContact as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'website' => $this->website ? $this->website->getValue() : null,
            'email' => $this->email ? $this->email->getValue() : null,
            'telephone' => $this->telephone ?? null,
            'address' => $this->address ?? null
        ];
    }
}
