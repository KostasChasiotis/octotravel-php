<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * Allowed values "firstName" "lastName" "emailAddress" "phoneNumber" "country" "notes" "locales"
 */

enum ContactField: string
{
    case firstName = 'firstName';

    case lastName = 'lastName';

    case emailAddress = 'emailAddress';

    case phoneNumber = 'phoneNumber';

    case country = 'country';

    case notes = 'notes';

    case locales = 'locales';
}
