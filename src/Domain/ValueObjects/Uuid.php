<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;

/**
 * A type-safe UUID. This ensures that only valid UUIDs can be instantiated, adhering to the Value Object pattern.
 */

class Uuid
{
    private string $value;

    /**
     * Uuid constructor.
     *
     * @param string $uuid
     * @throws \InvalidArgumentException
     */
    public function __construct(string $uuid)
    {
        if (!self::isValid($uuid)) {
            throw new \InvalidArgumentException("Invalid UUID: $uuid");
        }

        $this->value = $uuid;
    }

    /**
     * Generates a new UUID.
     *
     * @return static
     */
    public static function generate(): self
    {
        return new self(self::generateUuidV4());
    }

    /**
     * Validates if the provided string is a valid UUID.
     *
     * @param string $uuid
     * @return bool
     */
    public static function isValid(string $uuid): bool
    {
        return preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $uuid
        ) === 1;
    }

    /**
     * Returns the UUID as a string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Compares this UUID with another for equality.
     *
     * @param Uuid $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    /**
     * Generate a UUID v4.
     *
     * @return string
     */
    private static function generateUuidV4(): string
    {
        // Use the random_bytes function to generate a secure UUID
        $data = random_bytes(16);

        // Set the version to 4 (UUID v4) and the variant bits to RFC 4122
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Set version to 0100
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Set variant to 10

        // Convert the binary data into a string representation
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}