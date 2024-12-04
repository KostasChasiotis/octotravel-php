<?php

namespace Tests\Unit\Application\Mappers;

use KostasChasiotis\OctoTravel\Application\Mappers\SupplierContactMapper;
use KostasChasiotis\OctoTravel\Domain\Entities\SupplierContact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;
use PHPUnit\Framework\TestCase;

class SupplierContactMapperTest extends TestCase
{
    public function testMapReturnsSupplierContact()
    {
        // Arrange
        $rawData = [
            'website' => 'https://example.com',
            'email' => 'contact@example.com',
            'telephone' => '+123456789',
            'address' => '123 Main Street'
        ];

        // Act
        $result = SupplierContactMapper::map($rawData);

        // Assert
        $this->assertInstanceOf(SupplierContact::class, $result);
        $this->assertEquals(new Uri('https://example.com'), $result->getWebsite());
        $this->assertEquals(new Email('contact@example.com'), $result->getEmail());
        $this->assertEquals('+123456789', $result->getTelephone());
        $this->assertEquals('123 Main Street', $result->getAddress());
    }

    public function testMapHandlesMissingOptionalFields()
    {
        // Arrange
        $rawData = [
            'email' => 'contact@example.com',
        ];

        // Act
        $result = SupplierContactMapper::map($rawData);

        // Assert
        $this->assertInstanceOf(SupplierContact::class, $result);
        $this->assertNull($result->getWebsite());
        $this->assertEquals(new Email('contact@example.com'), $result->getEmail());
        $this->assertNull($result->getTelephone());
        $this->assertNull($result->getAddress());
    }
}
