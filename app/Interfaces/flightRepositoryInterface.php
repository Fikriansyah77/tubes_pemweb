<?php

namespace App\Interfaces;

interface flightRepositoryInterface
{
    public function getAllflight($filter = null);

    public function getflightByFlightNumber($flight_number);

}