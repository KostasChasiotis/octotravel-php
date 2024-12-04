<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

/**
 * A type-safe class for a valid email address
 */
class Email
{
    private string $email;

    /**
     * Email constructor.
     *
     * @param string $email The Email to validate and store.
     * @throws InvalidArgumentException If the provided Email is not valid.
     */
    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid Email: $email");
        }
        $this->email = $email;
    }

    /**
     * Get the Email value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->email;
    }
}
