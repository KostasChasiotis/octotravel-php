<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * This is the base unit type for this unit definition.
 * 
 * A value of TRAVELLER MUST only be used in replacement of ADULT, CHILD, INFANT, YOUTH, STUDENT, or SENIOR.
 * 
 * Allowed values "ADULT" "YOUTH" "CHILD" "INFANT" "FAMILY" "SENIOR" "STUDENT" "MILITARY" "OTHER"
 */

enum UnitType: string
{
    case ADULT = 'ADULT';

    case YOUTH = 'YOUTH';

    case CHILD = 'CHILD';

    case INFANT = 'INFANT';

    case FAMILY = 'FAMILY';

    case SENIOR = 'SENIOR';

    case STUDENT = 'STUDENT';

    case MILITARY = 'MILITARY';

    case OTHER = 'OTHER';
}
