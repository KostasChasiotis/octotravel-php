<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\AvailabilityCheck;
use KostasChasiotis\OctoTravel\Domain\Entities\Availabilities;
use KostasChasiotis\OctoTravel\Domain\Entities\Availability;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityStatus;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHours;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\OpeningHoursArray;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\TimeOfDay;
use PHPUnit\Framework\TestCase;

class AvailabilityCheckTest extends TestCase
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
                    "id": "2022-06-30T00:00:00+01:00",
                    "localDateTimeStart": "2022-06-30T00:00:00+01:00",
                    "localDateTimeEnd": "2022-07-01T00:00:00+01:00",
                    "allDay": true,
                    "available": true,
                    "status": "FREESALE",
                    "vacancies": null,
                    "capacity": null,
                    "maxUnits": null,
                    "utcCutoffAt": "2022-06-29T22:00:00Z",
                    "openingHours": [
                    {
                        "from": "09:00",
                        "to": "17:00"
                    }
                    ]
                }
            ]'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $availabiltyCalendar = new AvailabilityCheck(
            '6b903d44-dc24-4ca4-ae71-6bde6c4f4854',
            'DEFAULT',
            new DateTimeImmutable('2022-05-23'),
            new DateTimeImmutable('2022-05-29'),
            null,
            null,
            $clientMock
        );

        // Act
        $result = $availabiltyCalendar->execute();

        // Assert
        $this->assertInstanceOf(Availabilities::class, $result);
        $this->assertInstanceOf(Availability::class, $result->getAvailabilities()[0]);
        $this->assertEquals('2022-06-30T00:00:00+01:00', $result->getAvailabilities()[0]->getId());
        $this->assertEquals(new DateTimeImmutable('2022-06-30T00:00:00+01:00'), $result->getAvailabilities()[0]->getLocalDateTimeStart());
        $this->assertEquals(new DateTimeImmutable('2022-07-01T00:00:00+01:00'), $result->getAvailabilities()[0]->getLocalDateTimeEnd());
        $this->assertEquals(true, $result->getAvailabilities()[0]->getAllDay());
        $this->assertEquals(true, $result->getAvailabilities()[0]->getAvailable());
        $this->assertEquals(AvailabilityStatus::from('FREESALE'), $result->getAvailabilities()[0]->getStatus());
        $this->assertEquals(null, $result->getAvailabilities()[0]->getVacancies());
        $this->assertEquals(null, $result->getAvailabilities()[0]->getCapacity());
        $this->assertEquals(null, $result->getAvailabilities()[0]->getMaxUnits());
        $this->assertEquals(new DateTimeImmutable('2022-06-29T22:00:00Z'), $result->getAvailabilities()[0]->getUtcCutoffAt());
        $this->assertInstanceOf(OpeningHoursArray::class, $result->getAvailabilities()[0]->getOpeningHours());
        $this->assertInstanceOf(OpeningHours::class, $result->getAvailabilities()[0]->getOpeningHours()->getOpeningHours()[0]);
        $this->assertEquals(new TimeOfDay(9, 0), $result->getAvailabilities()[0]->getOpeningHours()->getOpeningHours()[0]->getFrom());
        $this->assertEquals(new TimeOfDay(17, 0), $result->getAvailabilities()[0]->getOpeningHours()->getOpeningHours()[0]->getTo());
    }
}
