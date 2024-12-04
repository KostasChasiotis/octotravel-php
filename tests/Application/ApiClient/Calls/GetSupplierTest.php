<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetSupplier;
use KostasChasiotis\OctoTravel\Domain\Entities\Supplier;
use KostasChasiotis\OctoTravel\Domain\Entities\SupplierContact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Email;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uri;
use PHPUnit\Framework\TestCase;

class GetSupplierTest extends TestCase
{
    public function testExecuteReturnsSupplier()
    {
        // Arrange
        $clientMock = $this->createMock(Client::class);

        $responseMock = new Response(
            200,
            [],
            '{
                "id": "48b4d2e9-cd8b-4ac2-a5ee-4217bf2622c2",
                "name": "Example Company",
                "endpoint": "https://example.com",
                "contact": {
                    "website": "https://example.com",
                    "email": "contact@example.com",
                    "telephone": "+123456789",
                    "address": "123 Main Street"
                }
            }'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $getSupplier = new GetSupplier($clientMock);

        // Act
        $result = $getSupplier->execute();

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
