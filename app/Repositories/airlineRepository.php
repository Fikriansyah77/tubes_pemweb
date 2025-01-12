<?php

namespace App\Repositories;

use App\Interfaces\airlineRepositoryInterface;

class airlineRepository implements airlineRepositoryInterface
{
    public function getAllairlines()
    {
        return airline::all();
    }
}