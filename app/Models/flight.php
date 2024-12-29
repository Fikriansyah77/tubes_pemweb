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

    public function airline()
    {
        return $this->belongsTo(airline::class);
    }

    public function segments()
    {
        return $this->hasMany(flightsegment::class);
    }

    public function classes()
    {
        return $this->hasMany(flightclass::class);
    }

    public function seats()
    {
        return $this->hasMany(flightseat::class);
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
