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

    protected $appends = ['average_rating', 'total_ratings'];

    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating');
    }

    public function getTotalRatingsAttribute()
    {
        return $this->ratings()->count();
    }

    public function features() {
        return $this->hasMany(RentHouseFeature::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
