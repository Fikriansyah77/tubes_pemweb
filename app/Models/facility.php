<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facility extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'description'
    ];

    public function classes()
    {
        return $this->belongsToMany(flightclass::class, 'flight_class_facility', 'facility_id', 'flightclass_id');
    }
}
