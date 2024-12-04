<?php

namespace KostasChasiotis\OctoTravel\Application\Mappers;

interface MapperInterface
{
    /**
     * Maps raw data into the entity type.
     *
     * @param array $data
     * @return mixed
     */
    public static function map(array $data): mixed;
}
