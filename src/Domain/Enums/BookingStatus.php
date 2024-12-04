<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * The status of the booking, possible values are: 
 * 
 * ON_HOLD The booking is pending confirmation, 
 * this is the default value when you first create the booking. 
 * 
 * EXPIRED If the booking is not confirmed before the expiration hold expires,
 * it goes into an expired state. 
 * 
 * CONFIRMED Once the confirmation call is made the booking is ready to be used. 
 * 
 * CANCELLED If the booking is cancelled. 
 * 
 * PENDING If the booking is pending outside availability confirmation. 
 * 
 * REDEEMED If the booking is already redeemed.
 */
enum BookingStatus: string
{
    case ON_HOLD = 'ON_HOLD';

    case EXPIRED = 'EXPIRED';

    case CONFIRMED = 'CONFIRMED';

    case CANCELLED = 'CANCELLED';

    case PENDING = 'PENDING';

    case REDEEMED = 'REDEEMED';
}
