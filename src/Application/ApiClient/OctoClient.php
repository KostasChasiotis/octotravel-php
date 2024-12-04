<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient;

use DateTimeImmutable;
use GuzzleHttp\Client;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetProduct;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetProducts;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetSupplier;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\AvailabilityCheck;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\AvailabilityCalendar;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\BookingCancellation;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\BookingConfirmation;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\BookingReservation;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\BookingUpdate;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\ExtendReservation;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetBooking;
use KostasChasiotis\OctoTravel\Application\ApiClient\Calls\GetBookings;
use KostasChasiotis\OctoTravel\Domain\Entities\Availability;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnits;
use KostasChasiotis\OctoTravel\Domain\Entities\Booking;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItems;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingReservationUnitItems;
use KostasChasiotis\OctoTravel\Domain\Entities\Bookings;
use KostasChasiotis\OctoTravel\Domain\Entities\Contact;
use KostasChasiotis\OctoTravel\Domain\Entities\Product;
use KostasChasiotis\OctoTravel\Domain\Entities\Products;
use KostasChasiotis\OctoTravel\Domain\Entities\Supplier;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\AvailabilityCalendarArray;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

/**
 * OctoClient is the primary client for interacting with the OctoTravel API.
 * 
 * It abstracts the Guzzle HTTP client and provides access to specific API calls.
 */
class OctoClient
{
    /**
     * @var string The base URI for the API client.
     */
    private string $baseUri;

    /**
     * @var array|null Optional headers to be included in API requests.
     */
    private ?array $headers;

    /**
     * @var Client|null Lazily instantiated HTTP client.
     */
    private ?Client $client = null;

    /**
     * OctoClient constructor.
     *
     * @param string $baseUri The base URI of the API.
     * @param array|null $headers Optional headers for requests.
     */
    public function __construct(string $baseUri, ?array $headers = null)
    {
        $this->baseUri = $baseUri;
        $this->headers = $headers;
    }

    /**
     * Lazy-loads and returns the Guzzle HTTP client.
     *
     * @return Client
     */
    private function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = new Client([
                'base_uri' => $this->baseUri,
                'headers' => $this->headers
            ]);
        }

        return $this->client;
    }

    /**
     * Returns the supplier and associated contact details.
     *
     * @return Supplier
     */
    public function getSupplier(): Supplier
    {
        $getSupplier = new GetSupplier($this->getClient());

        return $getSupplier->execute();
    }

    /**
     * Fetch the list of products.
     *
     * @return Products
     */
    public function getProducts(): Products
    {
        $getProducts = new GetProducts($this->getClient());

        return $getProducts->execute();
    }

    /**
     * Fetch the product for the given id.
     *
     * @param string The product id
     * 
     * @return Product
     */
    public function getProduct(string $productId): Product
    {
        $getProducts = new GetProduct($productId, $this->getClient());

        return $getProducts->execute();
    }

    /**
     * This endpoint is highly optimised and will return a single object per day. 
     * It's designed to be queried for large date ranges and the result is used to populate an availability calendar.
     * 
     * When the end user selects an open date you can call on /availability endpoint 
     * to get the availabilityId to create the booking.
     * 
     * @param string The product id.
     * 
     * @param string The option id.
     * 
     * @param DateTimeImmutable Start date to query for (YYYY-MM-DD).
     * 
     * @param DateTimeImmutable Start date to query for (YYYY-MM-DD).
     * 
     * @param AvailabilityUnits A list of units.
     * 
     * @return AvailabilityCalendarArray
     */
    public function availabilityCalendar(
        string $productId,
        string $optionId,
        DateTimeImmutable $localDateStart,
        DateTimeImmutable $localDateEnd,
        ?AvailabilityUnits $units
    ): AvailabilityCalendarArray {
        $availabilityCalendar = new AvailabilityCalendar(
            $productId,
            $optionId,
            $localDateStart,
            $localDateEnd,
            $units,
            $this->getClient()
        );

        return $availabilityCalendar->execute();
    }

    /**
     * This endpoint is slightly slower as it will return an object for each individual departure time (or day).
     * 
     * You have to perform this step to retrieve an availabilityId in order to confirm a sale, 
     * so if you just want to use this endpoint and skip the calendar endpoint then that's perfectly ok.
     * 
     * You must pass in one of the following combinations of parameters for this endpoint:
     * 
     * localDate
     * 
     * localeDateStart and localDateEnd
     * 
     * availabilityIds
     * 
     * @param string $productId The product id.
     * 
     * @param string $optionId The option id.
     * 
     * @param null|DateTimeImmutable $localDateStart Start date to query for (YYYY-MM-DD). Required if localDateEnd is set.
     * 
     * @param null|DateTimeImmutable $localDateEnd End date to query for (YYYY-MM-DD). Required if localDateStart is set.
     * 
     * @param null|array $availabilityIds Filter the results by the given ids.
     * 
     * @param null|AvailabilityUnits $units A list of units.
     * 
     * @return Availability
     */
    public function availabilityCheck(
        string $productId,
        string $optionId,
        ?DateTimeImmutable $localDateStart,
        ?DateTimeImmutable $localDateEnd,
        ?array $availabilityIds,
        ?AvailabilityUnits $units
    ): mixed {
        $availabilityCheck = new AvailabilityCheck(
            $productId,
            $optionId,
            $localDateStart,
            $localDateEnd,
            $availabilityIds,
            $units,
            $this->getClient()
        );

        return $availabilityCheck->execute();
    }

    /**
     * Reserving availability when making a booking.
     * 
     * The steps to make a reservation are:
     * 
     * 1. Check Availability: Check the availability on the /availability endpoint to retrieve an availabilityId
     * 
     * 2. Booking Reservation (this step): Create a booking that reserves the availability while you collect payment
     * and contact information from the customer. 
     * The booking will remain with status ON_HOLD until the booking is confirmed or the reservation hold expires.
     * 
     * The availability for the booking is held for the amount of time equal to theexpirationMinutes parameter 
     * (if provided), up to an internal limit set by either the supplier or the OCTo provider. 
     * The utc_expires_at parameter in the response object will indicate when a reservtion will expire. 
     * A reservation can be extended by calling the /bookings/{uuid}/extend endpoint.
     * 
     * A reserved booking can be confirmed after the customer finalizes their choice 
     * on the /bookings/{uuid}/confirm endpoint provided the reservation had not expired.
     */
    public function bookingReservation(
        ?Uuid $uuid,
        string $productId,
        string $optionId,
        string $availabilityId,
        ?int $expirationMinutes,
        ?string $notes,
        BookingReservationUnitItems $unitItems
    ): Booking {
        $bookingReservation = new BookingReservation(
            $uuid,
            $productId,
            $optionId,
            $availabilityId,
            $expirationMinutes,
            $notes,
            $unitItems,
            $this->getClient()
        );

        return $bookingReservation->execute();
    }

    /**
     * This endpoint will fetch the bookings you have made for the given filters.
     * 
     * When using this endpoint you must include one of the following query parameters:
     * 
     * resellerReference
     * 
     * supplierReference
     * 
     * localDate
     * 
     * localDateStart and localDateEnd
     */
    public function getBookings(
        ?string $resellerReference,
        ?string $supplerReference,
        ?DateTimeImmutable $localDate,
        ?DateTimeImmutable $localDateStart,
        ?DateTimeImmutable $localDateEnd,
        ?string $productId,
        ?string $optionId,
    ): Bookings {
        $getBookings = new GetBookings(
            $resellerReference,
            $supplerReference,
            $localDate,
            $localDateStart,
            $localDateEnd,
            $productId,
            $optionId,
            $this->getClient()
        );

        return $getBookings->execute();
    }

    /**
     * This endpoint confirms the booking so it's ready to be used.
     */
    public function bookingConfirmation(
        Uuid $uuid,
        bool $emailReceipt,
        ?string $resellerReference,
        Contact $contact,
        BookingConfirmationUnitItems $unitItems,
    ): Booking {
        $bookingConfirmation = new BookingConfirmation(
            $uuid,
            $emailReceipt,
            $resellerReference,
            $contact,
            $unitItems,
            $this->getClient()
        );

        return $bookingConfirmation->execute();
    }

    /**
     * For cancelling bookings. 
     * 
     * You can only cancel a booking if booking.cancellable is TRUE,
     *  and is within the booking cancellation cut-off window.
     */
    public function bookingCancellation(
        Uuid $uuid,
        ?string $reason,
        bool $force,
    ): Booking {
        $bookingCancellation = new BookingCancellation(
            $uuid,
            $reason,
            $force,
            $this->getClient()
        );

        return $bookingCancellation->execute();
    }

    /**
     * Fetch the status of an existing booking.
     *
     * @return Booking
     */
    public function getBooking(Uuid $uuid): Booking
    {
        $getBooking = new GetBooking($uuid, $this->getClient());

        return $getBooking->execute();
    }

    /**
     * Updates a booking before and after it has been confirmed as long as it hasn't been redeemed or within
     * the cancellation cutoff window.
     * 
     * To know if the booking can be updated check the booking's cancellable field.
     * If the booking can be cancelled, it can also be updated. 
     * It's generally preferred to update a booking rather than cancelling it and rebooking.
     */
    public function bookingUpdate(
        Uuid $uuid,
        ?string $resellerReference,
        ?string $productId,
        ?string $optionId,
        string $availabilityId,
        ?string $expirationMinutes,
        ?string $notes,
        bool $emailReceipt,
        ?BookingConfirmationUnitItems $unitItems,
        ?Contact $contact
    ): Booking {
        $bookingUpdate = new BookingUpdate(
            $uuid,
            $resellerReference,
            $productId,
            $optionId,
            $availabilityId,
            $expirationMinutes,
            $notes,
            $emailReceipt,
            $unitItems,
            $contact,
            $this->getClient()
        );

        return $bookingUpdate->execute();
    }

    /**
     * Use this endpoint to hold the availability for a booking longer if the status is ON_HOLD.
     */
    public function extendReservation(
        Uuid $uuid,
        int $expirationMinutesz
    ): Booking {
        $extendReservation = new ExtendReservation(
            $uuid,
            $expirationMinutesz,
            $this->getClient()
        );

        return $extendReservation->execute();
    }
}
