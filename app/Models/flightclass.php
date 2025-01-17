<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flightclass extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'flight_id',
        'class_type',
        'price',
        'total_seats'
    ];

    public function flight()
    {
        return $this->belongsTo(flight::class);
    } 

    public function facilities()
    {
        return $this->belongsToMany(facility::class, 'flight_class_facility', 'flightclass_id', 'facility_id');
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
