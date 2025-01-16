<?php

namespace App\Repositories;

use App\Interfaces\airlineRepositoryInterface;
use App\Models\airline;

class airlineRepository implements airlineRepositoryInterface
{
    public function getAllairline()
    {
        return airline::all();
    }
}