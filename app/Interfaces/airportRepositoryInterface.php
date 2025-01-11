<?php

namespace App\Interfaces;

interface airportRepositoryInterface
{
    public function getAllairports();

    public function getairportBySlug($slug);

    public function getairportByIataCode($iata_code);


}