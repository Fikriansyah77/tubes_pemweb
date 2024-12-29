<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class promocode extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'code',
        'discount_type',
        'discont',
        'valid_until',
        'is_used'
    ];

    public function transaction()
    {
        return $this->hasOne(transaction::class);
    }
}
