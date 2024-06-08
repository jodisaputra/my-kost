<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rent_house() {
        return $this->belongsTo(RentHouse::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
