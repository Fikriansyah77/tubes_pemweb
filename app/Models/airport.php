<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airport extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'iata_code',
        'name',
        'image',
        'city',
        'country',
    ];

    public function segment()
    {
        return $this->hasMany(flightsegment::class);
    }
}
