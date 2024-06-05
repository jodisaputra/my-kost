<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\RentHouse;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Share Home Properties - Rent House')]
class RentHousePage extends Component
{
    use withPagination;
    #[Url]
    public $selected_categories;
    #[Url]
    public $search;
    public function render()
    {
        $rent_houses = RentHouse::query()->where('is_active', 1)->with('features');
        $categories = Category::where('is_active', 1)->get();

        if($this->selected_categories != null && $this->selected_categories != 'all'){
            $rent_houses = $rent_houses->where('category_id',$this->selected_categories);
        }
        if($this->search != null && $this->search != ''){
            $rent_houses = $rent_houses->where('name', 'like', '%'.$this->search.'%');
        }
        return view('livewire.rent-house-page', [
            'rent_houses' => $rent_houses->paginate(10),
            'categories' => $categories
        ]);
    }
}
