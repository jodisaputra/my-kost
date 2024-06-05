<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\RentHouse;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        $rent_houses_featured = RentHouse::where('is_active', 1)->where('is_featured', 1)->with('features')->get();
        return view('livewire.home-page', [
            'categories' => $categories,
            'rent_houses_featured' => $rent_houses_featured,
        ]);
    }
}
