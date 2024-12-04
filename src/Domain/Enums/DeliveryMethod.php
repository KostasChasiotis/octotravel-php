<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * The delivery methods available for a booking.
 * 
 * Possible values are:
 * 
 * VOUCHER The voucher object is populated which is a single ticket for the whole booking.
 * 
 * TICKET The ticket object is populated on each unit item which is a ticket for each individual person.
 * 
 * If booking.deliveryMethods contains both TICKET and VOUCHER then both those values will be set. 
*/

enum DeliveryMethod: string
{
    case TICKET = 'TICKET';

    case VOUCHER = 'VOUCHER';
}
