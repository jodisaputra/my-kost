<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentHouse extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];


    public function features() {
        return $this->hasMany(RentHouseFeature::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
