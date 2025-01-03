<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airline extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'logo',
    ];

    public function flight()
    {
        return $this->hasMany(flight::class);
    }
}
