<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flight extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'flight_number',
        'airline_id',
    ];
}
