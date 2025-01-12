<?php

namespace App\Repositories;

use App\Models\flight;
use App\Interfaces\flightRepositoryInterface;

class flightRepository implements flightRepositoryInterface
{
    public function getAllflight($filter = null)
    {
        $flight = flight::query();

        if (!empty($filter['departure'])) {
            $flight->whereHas('segments', function ($query) use ($filter) {
                $query->where('airport_id', $filter['departure'])
                ->where('sequence', 1);
            });
        }

        if (!empty($filter['destination'])) {
            $flight->whereHas('segments', function ($query) use ($filter) {
                $query->where('airport_id', $filter['destination'])
                    ->orderBy('sequence', 'desc')
                    ->limit(1);
            });
        }

        if (!empty($filter['date'])) {
            $flight->whereHas('segments', function ($query) use ($filter) {
                $query->whereDate('time', $filter['date']);
            });
        }
        return $flight->get();

    }

    public function getflightByFlightNumber($flight_number)
    {
        return flight::where('flight_number', $flight_number)->first();
    }
}