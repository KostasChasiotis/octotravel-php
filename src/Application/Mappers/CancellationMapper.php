<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

use DateTimeImmutable;
use KostasChasiotis\OctoTravel\Domain\Entities\Cancellation;
use KostasChasiotis\OctoTravel\Domain\Enums\Refund;

/**
 * Maps raw data to a Cancellation entity.
 */
class CancellationMapper implements MapperInterface
{
    /**
     * Maps an array of raw data to a Cancellation entity.
     *
     * @param array $data The raw data to map.
     * 
     * @return Cancellation The mapped Cancellation entity.
     */
    public static function map(array $data): Cancellation
    {
        return new Cancellation(
            Refund::from($data['refund']),
            $data['reason'] ?? null,
            new DateTimeImmutable($data['utcCancelledAt'])
        );
    }
}
