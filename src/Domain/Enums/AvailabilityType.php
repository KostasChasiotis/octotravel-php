<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * What type of availability this product has.
 * 
 * Possible values are:
 * 
 * START_TIME if there are fixed departure times which you must pick one. Typical for day tours or activities.
 * 
 * OPENING_HOURS if you just select a date and can visit any time when the venue is open.
 */

enum AvailabilityType: string
{
    case START_TIME = 'START_TIME';

    case OPENING_HOURS = 'OPENING_HOURS';
}
