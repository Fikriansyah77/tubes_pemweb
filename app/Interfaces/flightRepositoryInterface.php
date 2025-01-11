<?php

namespace App\Interfaces;

interface flightRepositoryInterface
{
    public function getAllflights($filter = null);

    public function getflightByFlightNumber($flight_number);

}