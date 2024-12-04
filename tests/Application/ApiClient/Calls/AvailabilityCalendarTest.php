<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\AvailabilityCalendar;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityCalendar as EntitiesAvailabilityCalendar;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\AvailabilityCalendarArray;
use PHPUnit\Framework\TestCase;

class AvailabilityCalendarTest extends TestCase
{
    public function testExecuteReturnsProduct()
    {
        // Arrange
        $clientMock = $this->createMock(Client::class);

        $responseMock = new Response(
            200,
            [],
            '[
                {
                    "localDate": "2025-06-16",
                    "available": true,
                    "status": "AVAILABLE",
                    "vacancies": 10,
                    "capacity": 10,
                    "openingHours": []
                }
            ]'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $availabiltyCalendar = new AvailabilityCalendar(
            '6b903d44-dc24-4ca4-ae71-6bde6c4f4854',
            'DEFAULT',
            new DateTimeImmutable('2025-06-16'),
            new DateTimeImmutable('2025-06-16'),
            null,
            $clientMock
        );

        // Act
        $result = $availabiltyCalendar->execute();

        // Assert
        $this->assertInstanceOf(AvailabilityCalendarArray::class, $result);
        $this->assertInstanceOf(EntitiesAvailabilityCalendar::class, $result->getAvailabilityCalendarArray()[0]);
        $this->assertEquals('2025-06-16', $result->getAvailabilityCalendarArray()[0]->getLocalDate()->format('Y-m-d'));
        $this->assertEquals(true, $result->getAvailabilityCalendarArray()[0]->getAvailable());
        $this->assertEquals(10, $result->getAvailabilityCalendarArray()[0]->getVacancies());
        $this->assertEquals(10, $result->getAvailabilityCalendarArray()[0]->getCapacity());
        $this->assertEquals([], $result->getAvailabilityCalendarArray()[0]->getOpeningHours()->toArray());
    }
}
