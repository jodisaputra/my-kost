<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\RentHouse;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class RentHousePage extends Component
{
    use withPagination;
    #[Url]
    public $selected_categories;
    public function render()
    {
        $rent_houses = RentHouse::query()->where('is_active', 1)->with('features');
        $categories = Category::where('is_active', 1)->get();

        if($this->selected_categories != null && $this->selected_categories != 'all'){
            $rent_houses = $rent_houses->where('category_id',$this->selected_categories);
        }
        return view('livewire.rent-house-page', [
            'rent_houses' => $rent_houses->paginate(10),
            'categories' => $categories
        ]);
    }
}
