<?php

namespace KostasChasiotis\OctoTravel\Application\ApiClient\Calls;

interface ApiCallInterface
{
    /**
     * Executes the API call and returns the result.
     *
     * @return mixed
     */
    public function execute();
}
