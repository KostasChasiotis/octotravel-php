<?php

namespace KostasChasiotis\OctoTravel\Domain\ValueObjects;
use Respect\Validation\Validator;

class Uri
{
    private string $uri;

    /**
     * Uri constructor.
     *
     * @param string $uri The URI to validate and store.
     * @throws InvalidArgumentException If the provided URI is not valid.
     */
    public function __construct(string $uri)
    {
        if (!Validator::url()->domain($uri)) {
            throw new \InvalidArgumentException("Invalid URI: $uri");
        }
        $this->uri = $uri;
    }

    /**
     * Get the URI value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->uri;
    }
}
