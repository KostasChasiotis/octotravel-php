<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetBookings;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\Entities\Bookings;
use PHPUnit\Framework\TestCase;

class GetBookingsTest extends TestCase
{
    public function testExecuteReturnsBookings()
    {
        // Arrange
        $clientMock = $this->createMock(Client::class);

        $responseMock = new Response(
            200,
            [],
            '[
                {
                    "id": "3ef65048-5ffe-474f-8a5c-fb35a9faa6ed",
                    "uuid": "814d2566-2c71-4e6a-aaa9-59b9bf26cc0d",
                    "testMode": true,
                    "resellerReference": null,
                    "supplierReference": "RNSRSM",
                    "status": "CONFIRMED",
                    "utcCreatedAt": "2022-05-25T11:07:05Z",
                    "utcUpdatedAt": "2022-05-25T11:09:32Z",
                    "utcExpiresAt": null,
                    "utcRedeemedAt": null,
                    "utcConfirmedAt": "2022-05-25T11:09:32Z",
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
                    "id": "2022-04-30T00:00:00+01:00",
                    "localDateTimeStart": "2022-04-30T00:00:00+01:00",
                    "localDateTimeEnd": "2022-05-01T00:00:00+01:00",
                    "allDay": true,
                    "available": true,
                    "status": "AVAILABLE",
                    "utcCutoffAt": "2022-04-30T00:00:00+01:00",
                    "openingHours": [
                        {
                        "from": "09:00",
                        "to": "17:00"
                        }
                    ]
                    },
                    "contact": {
                    "fullName": "John",
                    "firstName": "Doe",
                    "lastName": null,
                    "emailAddress": "john.doe@email.com",
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
                    "deliveryOptions": [
                        {
                        "deliveryFormat": "PDF_URL",
                        "deliveryValue": "https://api.octomock.com/octo/pdf?booking=814d2566-2c71-4e6a-aaa9-59b9bf26cc0d"
                        },
                        {
                        "deliveryFormat": "QRCODE",
                        "deliveryValue": "RNSRSM"
                        }
                    ]
                    },
                    "unitItems": [
                    {
                        "uuid": "a204e6de-7909-4bf2-b7a8-2884189534bc",
                        "resellerReference": null,
                        "supplierReference": "1LTYVC",
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
                        "deliveryOptions": [
                            {
                            "deliveryFormat": "PDF_URL",
                            "deliveryValue": "https://api.octomock.com/octo/pdf?booking=814d2566-2c71-4e6a-aaa9-59b9bf26cc0d&ticket=a204e6de-7909-4bf2-b7a8-2884189534bc"
                            },
                            {
                            "deliveryFormat": "QRCODE",
                            "deliveryValue": "1LTYVC"
                            }
                        ]
                        }
                    },
                    {
                        "uuid": "9116e598-6713-4cb5-8ba4-e5b839f7a5d5",
                        "resellerReference": null,
                        "supplierReference": "A89VR8",
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
                        "deliveryOptions": [
                            {
                            "deliveryFormat": "PDF_URL",
                            "deliveryValue": "https://api.octomock.com/octo/pdf?booking=814d2566-2c71-4e6a-aaa9-59b9bf26cc0d&ticket=9116e598-6713-4cb5-8ba4-e5b839f7a5d5"
                            },
                            {
                            "deliveryFormat": "QRCODE",
                            "deliveryValue": "A89VR8"
                            }
                        ]
                        }
                    }
                    ]
                }
                ]'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $getBookings = new GetBookings(
            null,
            'RNSRSM',
            null,
            null,
            null,
            null,
            null,
            $clientMock
        );

        // Act
        $result = $getBookings->execute();

        // Assert
        $this->assertInstanceOf(Bookings::class, $result);
        $this->assertInstanceOf(Booking::class, $result->getBookings()[0]);
    }
}
