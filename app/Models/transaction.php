<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'code',
        'flight_id',
        'flightclass_id',
        'name',
        'email',
        'phone',
        'number_of_passengers',
        'promocode_id',
        'payment_status',
        'subtotal',
        'grandtotal'
    ];

    public function flight()
    {
        return $this->belongsTo(flight::class);
    }

    public function class()
    {
        return $this->belongsTo(flightclass::class);
    }

    public function promo()
    {
        return $this->belongsTo(promocode::class);
    }

    public function passenger()
    {
        return $this->hasMany(transactionpassenger::class);
    }
}
