<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionpassenger extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'flightseat_id',
        'name',
        'date_of_birth',
        'nationality'
    ];
}
