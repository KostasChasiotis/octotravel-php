<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\BookingUpdate;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\ExtendReservation;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;
use PHPUnit\Framework\TestCase;

class BookingUpdateTest extends TestCase
{
    public function testExecuteBookingUpdate()
    {
        // Arrange
        $clientMock = $this->createMock(Client::class);

        $responseMock = new Response(
            200,
            [],
            '{
                "id": "602a9fdf-5c79-4984-9474-7e14da9b6027",
                "uuid": "a88b4b8d-9c3b-4a09-ba27-323b43af57e4",
                "testMode": true,
                "resellerReference": null,
                "supplierReference": "XOPSUT",
                "status": "ON_HOLD",
                "utcCreatedAt": "2022-05-25T10:34:22Z",
                "utcUpdatedAt": "2022-05-25T10:34:22Z",
                "utcExpiresAt": "2022-05-25T11:04:22Z",
                "utcRedeemedAt": null,
                "utcConfirmedAt": null,
                "productId": "1",
                "product": {
                    "id": "1",
                    "internalName": "PPU | OH",
                    "reference": null,
                    "locale": "en",
                    "timeZone": "Europe/London",
                    "allowFreesale": false,
                    "instantConfirmation": true,
                    "instantDelivery": true,
                    "availabilityRequired": true,
                    "availabilityType": "OPENING_HOURS",
                    "deliveryFormats": [
                    "PDF_URL",
                    "QRCODE"
                    ],
                    "deliveryMethods": [
                    "TICKET",
                    "VOUCHER"
                    ],
                    "redemptionMethod": "DIGITAL",
                    "options": [
                    {
                        "id": "DEFAULT",
                        "default": true,
                        "internalName": "DEFAULT",
                        "reference": null,
                        "availabilityLocalStartTimes": [
                        "00:00"
                        ],
                        "cancellationCutoff": "0 hours",
                        "cancellationCutoffAmount": 0,
                        "cancellationCutoffUnit": "hour",
                        "requiredContactFields": [],
                        "restrictions": {
                        "minUnits": 0,
                        "maxUnits": null
                        },
                        "units": [
                        {
                            "id": "adult",
                            "internalName": "adult",
                            "reference": "adult",
                            "type": "ADULT",
                            "requiredContactFields": [],
                            "restrictions": {
                            "minAge": 18,
                            "maxAge": 100,
                            "idRequired": false,
                            "minQuantity": null,
                            "maxQuantity": null,
                            "paxCount": 1,
                            "accompaniedBy": []
                            }
                        }
                        ]
                    }
                    ]
                },
                "optionId": "DEFAULT",
                "option": {
                    "id": "DEFAULT",
                    "default": true,
                    "internalName": "DEFAULT",
                    "reference": null,
                    "availabilityLocalStartTimes": [
                    "00:00"
                    ],
                    "cancellationCutoff": "0 hours",
                    "cancellationCutoffAmount": 0,
                    "cancellationCutoffUnit": "hour",
                    "requiredContactFields": [],
                    "restrictions": {
                    "minUnits": 0,
                    "maxUnits": null
                    },
                    "units": [
                    {
                        "id": "adult",
                        "internalName": "adult",
                        "reference": "adult",
                        "type": "ADULT",
                        "requiredContactFields": [],
                        "restrictions": {
                        "minAge": 18,
                        "maxAge": 100,
                        "idRequired": false,
                        "minQuantity": null,
                        "maxQuantity": null,
                        "paxCount": 1,
                        "accompaniedBy": []
                        }
                    }
                    ]
                },
                "cancellable": true,
                "cancellation": null,
                "freesale": false,
                "availabilityId": "2022-04-30T00:00:00+01:00",
                "availability": {
                    "id": "2024-12-26T14:00:00+02:00",
                    "allDay": false,
                    "status": "AVAILABLE",
                    "capacity": 50,
                    "maxUnits": 50,
                    "paxCount": 0,
                    "available": true,
                    "vacancies": 50,
                    "maxPaxCount": 50,
                    "utcCutoffAt": "2024-12-26T12:00:00Z",
                    "openingHours": [
                    {
                        "to": "23:59",
                        "from": "00:00"
                    }
                    ],
                    "totalCapacity": 50,
                    "totalPaxCount": 0,
                    "localDateTimeEnd": "2024-12-26T18:00:00+02:00",
                    "localDateTimeStart": "2024-12-26T14:00:00+02:00"
                },
                "contact": {
                    "fullName": null,
                    "firstName": null,
                    "lastName": null,
                    "emailAddress": null,
                    "phoneNumber": null,
                    "locales": [],
                    "country": null,
                    "notes": null
                },
                "notes": null,
                "deliveryMethods": [
                    "TICKET",
                    "VOUCHER"
                ],
                "voucher": {
                    "redemptionMethod": "DIGITAL",
                    "utcRedeemedAt": null,
                    "deliveryOptions": []
                },
                "unitItems": [
                    {
                    "uuid": "6cbd2582-1345-4d8d-8223-ad004beebc1a",
                    "resellerReference": null,
                    "supplierReference": "CBIYWQ",
                    "unit": {
                        "id": "adult",
                        "internalName": "adult",
                        "reference": "adult",
                        "type": "ADULT",
                        "requiredContactFields": [],
                        "restrictions": {
                        "minAge": 18,
                        "maxAge": 100,
                        "idRequired": false,
                        "minQuantity": null,
                        "maxQuantity": null,
                        "paxCount": 1,
                        "accompaniedBy": []
                        }
                    },
                    "unitId": "adult",
                    "status": "ON_HOLD",
                    "utcRedeemedAt": null,
                    "contact": {
                        "fullName": null,
                        "firstName": null,
                        "lastName": null,
                        "emailAddress": null,
                        "phoneNumber": null,
                        "locales": [],
                        "country": null,
                        "notes": null
                    },
                    "ticket": {
                        "redemptionMethod": "DIGITAL",
                        "utcRedeemedAt": null,
                        "deliveryOptions": []
                    }
                    }
                ]
            }'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $bookingUpdate = new BookingUpdate(
            new Uuid('1a7213eb-3a33-4cbb-b114-64d771c201ac'),
            null,
            null,
            null,
            null,
            120,
            'Test Booking',
            false,
            null,
            null,
            $clientMock
        );

        // Act
        $result = $bookingUpdate->execute();

        // Assert
        $this->assertInstanceOf(Booking::class, $result);
        $this->assertEquals('602a9fdf-5c79-4984-9474-7e14da9b6027', $result->getId());
    }
}
