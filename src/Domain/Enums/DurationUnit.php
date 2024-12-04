<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * Time units used to determine duration. Three values are available: hour, minute, day.
 * 
 * Allowed values "hour" "minute" "day"
 */

enum DurationUnit: string
{
    case hour = 'hour';

    case minute = 'minute';

    case day = 'day';
}
