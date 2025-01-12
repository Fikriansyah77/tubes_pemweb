<?php

namespace App\Repositories;

use App\Interfaces\airportRepositoryInterface;
use App\Models\airport;

class airportRepository implements airportRepositoryInterface
{
    public function getAllairport()
    {
        return airport::all();
    }

    public function getairportBySlug($slug)
    {
        return airport::where('slug', $slug)->first();
    }

    public function getairportByIataCode($iata_code)
    {
        return airport::where('iata_code', $iata_code)->first();
    }
}