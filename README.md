# Octo.travel API PHP Library

A simple, robust PHP library for interacting with the [Octo.travel API](https://www.octo.travel/). This library provides an object-oriented interface to easily consume the API, including functionality for retrieving suppliers, managing products, and checking availability.
<br>
<br>

## Features

- Fully typed classes and value objects for a safer and clearer interface.
- Built-in support for all API endpoints.
- Easy-to-extend architecture using mappers and API call abstractions.
- Guzzle HTTP client for efficient and reliable HTTP requests.
<br>
<br>

## Installation

Install the library using Composer:

```bash
composer require kostaschasiotis/octotravel-php
```
<br>
<br>

## Usage

### Setup

Create an instance of the OctoClient with your API base URL and optional headers.

```php
indlude('/path-to/vendor/autoload.php');

use KostasChasiotis\OctoTravel\Application\ApiClient\OctoClient;

$client = new OctoClient(
    baseUri: 'https://www.example.com/api_url/',
    headers: [
        'Authorization' => 'Bearer YOUR_API_KEY',
        'Content-Type' => 'application/json'
    ]
);
```
<br>
<br>

### Endpoints
<br>

**Get Supplier**

Returns the supplier and associated contact details.

```php
$supplier = $client->getSupplier();
```
<br>
<br>

**Get Products**

Fetch the list of products.

```php
$products = $client->getProducts();
```
<br>
<br>

**Get Single Product**

Fetch the product for the given id.

```php
$products = $client->getProduct('PRODUCT_ID');
```
<br>
<br>

**Get Availability Calendar**

This endpoint is highly optimised and will return a single object per day.
It's designed to be queried for large date ranges and the result is used to populate an availability calendar.

```php
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnit;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnits;

$availabilityCalendar = $client->availabilityCalendar(
    'PRODUCT_ID',
    'OPTION_ID',
    new DateTimeImmutable('START_DATE'),
    new DateTimeImmutable('END_DATE'),
    new AvailabilityUnits(
        new AvailabilityUnit(AVAILABILITY_
            //... AvailabilityUnit Details
        ),
        ...
    )
);
```
<br>
<br>

**Check Availability**

This endpoint is slightly slower as it will return an object for each individual departure time (or day).

You have to perform this step to retrieve an availabilityId in order to confirm a sale, so if you just want to use this endpoint and skip the calendar endpoint then that's perfectly ok.

```php
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnit;
use KostasChasiotis\OctoTravel\Domain\Entities\AvailabilityUnits;

$availabilityCheck = $client->availabilityCheck(
    'PRODUCT_ID',
    'OPTION_ID',
    new DateTimeImmutable('START_DATE'),
    new DateTimeImmutable('END_DATE'),
    ['AVAILABILITY_ID'],
    new AvailabilityUnits(
        new AvailabilityUnit(
            //... Unit Details
        ),
        ...
    )
);
```
<br>
<br>

**Booking Reservation**

Reserving availability when making a booking.

```php
use KostasChasiotis\OctoTravel\Domain\Entities\BookingReservationUnitItem;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingReservationUnitItems;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$bookingReservations = $client->bookingReservation(
    new Uuid('UUID'),
    'PRODUCT_ID',
    'OPTION_ID',
    'AVAILABIITY_ID',
    EXPIRATION_MINUTES,
    'NOTES',
    new BookingReservationUnitItems(
        new BookingReservationUnitItem(
            new Uuid('UUID'),
            'UNIT_ID'
        ),
        ...
    )
);
```
<br>
<br>

**Get Bookings**

This endpoint will fetch the bookings you have made for the given filters.

When using this endpoint you must include one of the following query parameters:

- resellerReference
- supplierReference
- localDate
- localDateStart and localDateEnd

```php
$bookings = $client->getBookings(
    'RESELLER_REFERENCE',
    'SUPPLIER_REFERENCE',
    new DateTimeImmutable('LOCAL_DATE'),
    new DateTimeImmutable('START_DATE'),
    new DateTimeImmutable('END_DATE'),
    'PRODUCT_ID',
    'OPTION_ID'
);
```
<br>
<br>

**Booking Confirmation**

This endpoint confirms the booking so it's ready to be used.

```php
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItem;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItems;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$bookingConfirmation = $client->bookingConfirmation(
    new Uuid('UUID'),
    EMAIL_RECEIPT_TRUE_FALSE,
    'RESELLER_REFERENCE',
    new Contact(CONTACT_DETAILS),
    new BookingConfirmationUnitItems(
        new BookingConfirmationUnitItem(BOOKING_CONFIRMATION_UNIT_ITEM_DETAILS),
        ...
    )
);
```
<br>
<br>

**Booking Cancellation**

For cancelling bookings. You can only cancel a booking if booking.cancellable is TRUE, and is within the booking cancellation cut-off window.

```php
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$bookingCancellation = $client->bookingCancellation(
    new Uuid('UUID'),
    'REASON',
    FORCE_TRUE_OR_FALSE
);
```
<br>
<br>

**Get Booking**

Fetch the status of an existing booking.

```php
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$booking = $client->getBooking(new Uuid('UUID'));
```
<br>
<br>

**Booking Update**

Updates a booking before and after it has been confirmed as long as it hasn't been redeemed or within the cancellation cutoff window.

```php
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItem;
use KostasChasiotis\OctoTravel\Domain\Entities\BookingConfirmationUnitItems;
use KostasChasiotis\OctoTravel\Domain\Entities\Contact;
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$bookingUpdate = $client->bookingUpdate(
    new Uuid('UUID'),
    'RESELLER_REFERENCE',
    'PRODUCT_ID',
    'OPTION_ID',
    'AVAILABILITY_ID',
    'EXPIRATION_MINUTES',
    'NOTES',
    SEND_EMAIL_RECEIPT_TRUE_OR_FALSE,
    new BookingConfirmationUnitItems(
        new BookingConfirmationUnitItem(BOOKING_CONFIRMATION_UNIT_ITEM_DETAILS),
        ...
    ),
    new Contact(CONTACT_DETAILS)
);
```
<br>
<br>

**Extend Reservation**

Use this endpoint to hold the availability for a booking longer if the status is ON_HOLD.

```php
use KostasChasiotis\OctoTravel\Domain\ValueObjects\Uuid;

$bookingUpdate = $client->extendReservation(
    new Uuid('UUID'),
    EXPIRATION_MINUTES
);
```
<br>
<br>

## Extending the Library

This library uses a mapper-based architecture to map raw API responses to domain entities. You can easily add new endpoints or extend the functionality:

1. Create a New API Call Class Implement the ApiCallInterface for your custom API endpoint logic.
2. Add Mappers Map raw data to your domain entities using static mapper classes.
3. Register the Call Add the new call to OctoClient for easy access.
<br>
<br>

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a new feature branch: git checkout -b feature/your-feature-name.
3. Commit your changes: git commit -m "Add your message here".
4. Push the branch: git push origin feature/your-feature-name.
5. Open a pull request.
<br>
<br>

## License

This library is open-sourced under the MIT license.
<br>
<br>

## Acknowledgments

Special thanks to the Octo.travel team for providing the inspiration and API documentation for this library.
