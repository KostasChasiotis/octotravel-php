<?php

namespace Tests\Unit\Application\Mappers;

use KostasChasiotis\OctoTravel\Application\Mappers\SupplierMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\Supplier;
use KostasChasiotis\OctoTravel\Domain\Entities\SupplierContact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;
use PHPUnit\Framework\TestCase;

class SupplierMapperTest extends TestCase
{
    public function testMapReturnsSupplierContact()
    {
        // Arrange
        $rawData = [
            'id' => '48b4d2e9-cd8b-4ac2-a5ee-4217bf2622c2',
            'name' => 'Example Company',
            'endpoint' => 'https://example.com',
            'contact' => [
                'website' => 'https://example.com',
                'email' => 'contact@example.com',
                'telephone' => '+123456789',
                'address' => '123 Main Street'
            ]
        ];

        // Act
        $result = SupplierMapper::map($rawData);

        // Assert
        $this->assertInstanceOf(Supplier::class, $result);
        $this->assertEquals('48b4d2e9-cd8b-4ac2-a5ee-4217bf2622c2', $result->getId());
        $this->assertEquals('Example Company', $result->getName());
        $this->assertEquals(new Uri('https://example.com'), $result->getEndpoint());
        $this->assertEquals(new SupplierContact(
            new Uri('https://example.com'),
            new Email('contact@example.com'),
            '+123456789',
            '123 Main Street'
        ), $result->getContact());
    }
}
