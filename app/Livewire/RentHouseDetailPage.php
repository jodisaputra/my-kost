<?php

namespace App\Livewire;

use App\Models\RentHouse;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Share Home Properties - Rent House Detail')]
class RentHouseDetailPage extends Component
{
    public $slug;
    public function mount($slug): void
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $rent_house = RentHouse::where('slug', $this->slug)->with('features')->first();
        return view('livewire.rent-house-detail-page', [
            'rent_house' => $rent_house
        ]);
    }
}
