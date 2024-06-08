<?php

namespace App\Livewire;

use App\Models\RentHouse;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Share Home Properties - Transaction')]
class TransactionPage extends Component
{
    use WithFileUploads;

    public $slug;
    public $full_name;
    public $phone_number;
    public $rent_house_id;
    public $price;
    public $rent_house;
    public $proof_of_payment;

    public function mount($slug): void
    {
        $this->slug = $slug;
        $this->rent_house = RentHouse::where('slug', $slug)->first();

        if (!$this->rent_house) {
            // Handle the case where the rent house is not found
            abort(404, 'Rent house not found');
        }

        $this->rent_house_id = $this->rent_house->id;
        $this->price = $this->rent_house->price;
    }

    public function payment()
    {
        $this->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'proof_of_payment' => 'required|mimes:jpg,jpeg,png|max:2048|file',
        ]);

        DB::transaction(function () {
            $proof_of_payment = $this->proof_of_payment->store('proof_of_payment', 'public');

            Transaction::create([
                'rent_house_id' => $this->rent_house_id,
                'full_name' => $this->full_name,
                'phone_number' => $this->phone_number,
                'user_id' => Auth::user()->id,
                'grand_total' => $this->price,
                'proof_of_payment' => $proof_of_payment,
            ]);
        });

        return redirect('/my-transactions');
    }

    public function render()
    {
        return view('livewire.transaction-page', [
            'rent_house' => $this->rent_house
        ]);
    }


}
