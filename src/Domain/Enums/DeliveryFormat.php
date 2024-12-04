<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * The format for the delivery option.
 * 
 * Possible values are: 
 * 
 * QRCODE You should generate the QR Code yourself on a ticket. 
 * 
 * PDF_URL Where you use the generated tickets as a PDF.
 */

enum DeliveryFormat: string
{
    case QRCODE = 'QRCODE';

    case PDF_URL = 'PDF_URL';

    case PKPASS_URL = 'PKPASS_URL'; //Ventrata
}
