<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * The status of that date.
 * 
 * Possible values are: AVAILABLE This availability is available for sale 
 * 
 * FREESALE This availability has no capacity and is available. 
 * 
 * SOLD_OUT There are no more spots available for this date / slot. 
 * 
 * LIMITED This availability is available but has less than 50% capacity left. 
 * 
 * CLOSED Availability is closed for this day / slot.
 */

enum AvailabilityStatus: string
{
    /**
     * This availability is available for sale
     */
    case AVAILABLE = 'AVAILABLE';

    /**
     * This availability has no capacity and is available
     */
    case FREESALE = 'FREESALE';

    /**
     * There are no more spots available for this date / slot
     */
    case SOLD_OUT = 'SOLD_OUT';

    /**
     * This availability is available but has less than 50% capacity left
     */
    case LIMITED = 'LIMITED';

    /**
     * Availability is closed for this day / slot
     */
    case CLOSED = 'CLOSED';
}
