<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;

/**
 * The supplier class
 */

class Supplier
{
    /**
     * Unique identifier used in the platform to represent the supplier.
     * 
     * @var string
     */
    private string $id;

    /**
     * Name the supplier uses to identify itsel. Usually what the end customer will know the supplier as.
     * 
     * @var string
     */
    private string $name;

    /**
     * This is the base URL that will be prepended to ALL other paths. The value SHOULD NOT contain a trailing /.
     * 
     * @var Uri
     */
    private Uri $endpoint;

    /**
     * The contact details of the Supplier
     * 
     * @var SupplierContact
     */
    private SupplierContact $contact;

    public function __construct(
        string $id,
        string $name,
        Uri $endpoint,
        SupplierContact $contact
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->endpoint = $endpoint;
        $this->contact = $contact;
    }

    /**
     * Get unique identifier used in the platform to represent the supplier.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get name the supplier uses to identify itsel. Usually what the end customer will know the supplier as.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get this is the base URL that will be prepended to ALL other paths. The value SHOULD NOT contain a trailing /.
     *
     * @return Uri
     */
    public function getEndpoint(): Uri
    {
        return $this->endpoint;
    }

    /**
     * Get the contact details of the Supplier
     *
     * @return SupplierContact
     */
    public function getContact(): SupplierContact
    {
        return $this->contact;
    }

    /**
     * Return the Supplier as an associative array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'endpoint' => $this->endpoint->getValue(),
            'contact' => $this->contact->toArray()
        ];
    }
}
