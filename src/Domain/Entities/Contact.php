<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\Enums\Country;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Locales;

/**
 * Contact details for the guests that will attend the tour/attraction. 
 * 
 * Contact schema can be applied to both the booking object (the main reservation) 
 * or the unit object (individual ticket holders - if the supplier requires this information)
 */
class Contact
{
    /**
     * The full name of the booking holder or the ticket holder. 
     * 
     * Can also be retrieved as an alias for the concatenation of firstName and lastName
     * 
     * @var null|string
     */
    private ?string $fullName;

    /**
     * The first name of the booking holder or the ticket holder.
     * 
     * @var null|string
     */
    private ?string $firstName;

    /**
     * The last name of the booking holder or the ticket holder.
     * 
     * @var null|string
     */
    private ?string $lastName;

    /**
     * The email address of the booking holder or the ticket holder.
     * 
     * @var null|Email
     */
    private ?Email $emailAddress;

    /**
     * The phone number of the booking holder or the ticket holder.
     * 
     * @var null|string
     */
    private ?string $phoneNumber;

    /**
     * An array of locale values, equivalent to navigator.languages in a browsers environment.
     * 
     * @var Locales
     */
    private Locales $locales;

    /**
     * The PO Box of the booking holder or the ticket holder.
     * 
     * @var null|string
     */
    private ?string $postalCode;

    /**
     * The country of the booking holder or the ticket holder.
     * 
     * @var null|Country
     */
    private ?Country $country;

    /**
     * Optional notes for the booking.
     * 
     * @var null|string
     */
    private ?string $notes;

    public function __construct(
        ?string $fullName,
        ?string $firstName,
        ?string $lastName,
        ?Email $emailAddress,
        ?string $phoneNumber,
        ?Locales $locales,
        ?string $postalCode,
        ?Country $country,
        ?string $notes
    ) {
        $this->fullName = $fullName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->locales = $locales;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->notes = $notes;
    }

    /**
     * Get can also be retrieved as an alias for the concatenation of firstName and lastName
     *
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Get the first name of the booking holder or the ticket holder.
     *
     * @return null|string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Get the last name of the booking holder or the ticket holder.
     *
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Get the email address of the booking holder or the ticket holder.
     *
     * @return null|Email
     */
    public function getEmailAddress(): ?Email
    {
        return $this->emailAddress;
    }

    /**
     * Get the phone number of the booking holder or the ticket holder.
     *
     * @return null|string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Get an array of locale values, equivalent to navigator.languages in a browsers environment.
     *
     * @return Locales
     */
    public function getLocales(): Locales
    {
        return $this->locales;
    }

    /**
     * Get the PO Box of the booking holder or the ticket holder.
     *
     * @return null|string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Get the country of the booking holder or the ticket holder.
     *
     * @return null|Country
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * Get optional notes for the booking.
     *
     * @return null|string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * Return the Contact as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fullName' => $this->fullName ?? null,
            'firstName' => $this->firstName ?? null,
            'lastName' => $this->lastName ?? null,
            'emailAddress' => $this->emailAddress ? $this->emailAddress->getValue() : null,
            'phoneNumber' => $this->phoneNumber ?? null,
            'locales' => $this->locales ? $this->locales->getValues() : null,
            'postalCode' => $this->postalCode ?? null,
            'country' => $this->country->value ?? null,
            'notes' => $this->notes ?? null
        ];
    }
}
