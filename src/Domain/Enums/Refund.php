<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * Whether the booking was refunded as part of the cancellation.
 * 
 * Possible values are FULL, PARTIAL or NONE
 */
enum Refund: string
{
    case FULL = 'FULL';

    case PARTIAL = 'PARTIAL';

    case NONE = 'NONE';
}
