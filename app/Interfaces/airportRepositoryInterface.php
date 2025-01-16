<?php

namespace App\Interfaces;

interface airportRepositoryInterface
{
    public function getAllAirports();

    public function getairportBySlug($slug);

    public function getairportByIataCode($iata_code);


}