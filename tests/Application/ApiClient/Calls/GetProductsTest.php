<?php

namespace Tests\Unit\Application\ApiClient\Calls;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetProducts;
use KostasChasiotis\OctoTravel\Domain\Entities\Option;
use KostasChasiotis\OctoTravel\Domain\Entities\OptionRestrictions;
use KostasChasiotis\OctoTravel\Domain\Entities\Options;
use KostasChasiotis\OctoTravel\Domain\Entities\Product;
use KostasChasiotis\OctoTravel\Domain\Entities\Products;
use KostasChasiotis\OctoTravel\Domain\Entities\Unit;
use KostasChasiotis\OctoTravel\Domain\Entities\UnitRestrictions;
use KostasChasiotis\OctoTravel\Domain\Entities\Units;
use KostasChasiotis\OctoTravel\Domain\Enums\AvailabilityType;
use KostasChasiotis\OctoTravel\Domain\Enums\DurationUnit;
use KostasChasiotis\OctoTravel\Domain\Enums\Locale;
use KostasChasiotis\OctoTravel\Domain\Enums\RedemptionMethod;
use KostasChasiotis\OctoTravel\Domain\Enums\TimeZone;
use KostasChasiotis\OctoTravel\Domain\Enums\UnitType;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\ContactFields;
use PHPUnit\Framework\TestCase;

class GetProductsTest extends TestCase
{
    public function testExecuteReturnsProducts()
    {
        // Arrange
        $clientMock = $this->createMock(Client::class);

        $responseMock = new Response(
            200,
            [],
            '[
                {
                    "id": "6b903d44-dc24-4ca4-ae71-6bde6c4f4854",
                    "internalName": "Amazon River Tour",
                    "reference": "AMZN",
                    "locale": "en-GB",
                    "timeZone": "Europe/London",
                    "allowFreesale": true,
                    "instantConfirmation": true,
                    "instantDelivery": true,
                    "availabilityRequired": true,
                    "availabilityType": "START_TIME",
                    "deliveryFormats": [
                    "QRCODE"
                    ],
                    "deliveryMethods": [
                    "VOUCHER"
                    ],
                    "redemptionMethod": "DIGITAL",
                    "options": [
                    {
                        "id": "DEFAULT",
                        "default": true,
                        "internalName": "Private Morning Tour",
                        "reference": "VIP-MORN",
                        "availabilityLocalStartTimes": [
                        "09:00"
                        ],
                        "cancellationCutoff": "1 hour",
                        "cancellationCutoffAmount": 1,
                        "cancellationCutoffUnit": "hour",
                        "requiredContactFields": [
                        "firstName"
                        ],
                        "restrictions": {
                        "minUnits": null,
                        "maxUnits": 10
                        },
                        "units": [
                        {
                            "id": "adult_697e3ce8-1860-4cbf-80ad-95857df1f640",
                            "internalName": "Adult(s)",
                            "reference": "LR1-01-new",
                            "type": "YOUTH",
                            "requiredContactFields": [
                            "firstName"
                            ],
                            "restrictions": {
                            "minAge": 3,
                            "maxAge": 17,
                            "idRequired": true,
                            "minQuantity": 2,
                            "maxQuantity": 7,
                            "paxCount": 1,
                            "accompaniedBy": [
                                "adult_697e3ce8-1860-4cbf-80ad-95857df1f640"
                            ]
                            }
                        }
                        ]
                    }
                    ]
                }
            ]'
        );

        // Mocking the Client's get method
        $mockHandler = new MockHandler([$responseMock]);
        $handlerStack = HandlerStack::create($mockHandler);
        $clientMock = new Client(['handler' => $handlerStack]);
        $getProducts = new GetProducts($clientMock);
        
        // Act
        $result = $getProducts->execute();

        // Assert
        $this->assertInstanceOf(Products::class, $result);
        $this->assertInstanceOf(Product::class, $result->getProducts()[0]);
        $this->assertEquals('6b903d44-dc24-4ca4-ae71-6bde6c4f4854', $result->getProducts()[0]->getId());
        $this->assertEquals('Amazon River Tour', $result->getProducts()[0]->getInternalName());
        $this->assertEquals('AMZN', $result->getProducts()[0]->getReference());
        $this->assertEquals(Locale::from('en-GB'), $result->getProducts()[0]->getLocale());
        $this->assertEquals(TimeZone::from('Europe/London'), $result->getProducts()[0]->getTimeZone());
        $this->assertEquals(true, $result->getProducts()[0]->getAllowFreesale());
        $this->assertEquals(true, $result->getProducts()[0]->getInstantConfirmation());
        $this->assertEquals(true, $result->getProducts()[0]->getInstantDelivery());
        $this->assertEquals(true, $result->getProducts()[0]->getAvailabilityRequired());
        $this->assertEquals(AvailabilityType::from('START_TIME'), $result->getProducts()[0]->getAvailabilityType());
        $this->assertEquals(RedemptionMethod::from('DIGITAL'), $result->getProducts()[0]->getRedemptionMethod());
        $this->assertInstanceOf(Options::class, $result->getProducts()[0]->getOptions());
        $this->assertInstanceOf(Option::class, $result->getProducts()[0]->getOptions()->getOptions()[0]);
        $this->assertEquals('DEFAULT', $result->getProducts()[0]->getOptions()->getOptions()[0]->getId());
        $this->assertEquals(true, $result->getProducts()[0]->getOptions()->getOptions()[0]->getDefault());
        $this->assertEquals(
            'Private Morning Tour',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getInternalName()
        );
        $this->assertEquals(
            'VIP-MORN',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getReference()
        );
        $this->assertEquals(
            ["09:00"],
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getAvailabilityLocalStartTimes()->getTimesOfDay()
        );
        $this->assertEquals(
            '1 hour',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getCancellationCutoff()
        );
        $this->assertEquals(
            1,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getCancellationCutoffAmount()
        );
        $this->assertEquals(
            DurationUnit::from('hour'),
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getCancellationCutoffUnit()
        );
        $this->assertInstanceOf(
            OptionRestrictions::class,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getRestrictions()
        );
        $this->assertEquals(
            null,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getRestrictions()->getMinUnits()
        );
        $this->assertEquals(
            10,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getRestrictions()->getMaxUnits()
        );
        $this->assertInstanceOf(
            Units::class,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()
        );
        $this->assertInstanceOf(
            Unit::class,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]
        );
        $this->assertEquals(
            'adult_697e3ce8-1860-4cbf-80ad-95857df1f640',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getId()
        );
        $this->assertEquals(
            'Adult(s)',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getInternalName()
        );
        $this->assertEquals(
            'LR1-01-new',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getReference()
        );
        $this->assertEquals(
            UnitType::from('YOUTH'),
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getType()
        );
        $this->assertInstanceOf(
            ContactFields::class,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRequiredContactFields()
        );
        $this->assertEquals(
            'firstName',
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRequiredContactFields()->getValues()[0]
        );
        $this->assertInstanceOf(
            UnitRestrictions::class,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()
        );
        $this->assertEquals(
            3,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getMinAge()
        );
        $this->assertEquals(
            17,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getMaxAge()
        );
        $this->assertEquals(
            true,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getIdRequired()
        );
        $this->assertEquals(
            2,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getMinQuantity()
        );
        $this->assertEquals(
            7,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getMaxQuantity()
        );
        $this->assertEquals(
            1,
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getPaxCount()
        );
        $this->assertEquals(
            ["adult_697e3ce8-1860-4cbf-80ad-95857df1f640"],
            $result->getProducts()[0]->getOptions()->getOptions()[0]->getUnits()->getUnits()[0]->getRestirctions()->getAccompaniedBy()
        );
    }
}
