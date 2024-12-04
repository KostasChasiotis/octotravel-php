<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * How the voucher can be redeemed.
 * 
 * Possible values are:
 * 
 * MANIFEST The guest name will be written down and they just need to show up 
 * 
 * DIGITAL The tickets/voucher must be scanned but can be on mobile 
 * 
 * PRINT The tickets/voucher must be printed and presented on arrival
 */

enum RedemptionMethod: string
{
    case MANIFEST = 'MANIFEST';

    case DIGITAL = 'DIGITAL';

    case PRINT = 'PRINT';
}
