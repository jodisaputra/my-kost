<?php

namespace App\Livewire;

use App\Models\Rating;
use App\Models\Transaction;
use Livewire\Component;

class RateTransaction extends Component
{
    public $transactionId;
    public $rentHouseId;
    public $rating;
    public $formVisible = true; // Add formVisible property

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
    ];

    public function mount($transactionId, $rentHouseId)
    {
        $this->transactionId = $transactionId;
        $this->rentHouseId = $rentHouseId;
        $rating = Rating::where('transaction_id', $transactionId)->first();
        if ($rating) {
            $this->rating = $rating->rating;
            $this->formVisible = false; // Hide form if rating exists
        }
    }

    public function rateTransaction()
    {
        $this->validate();

        Rating::updateOrCreate(
            ['transaction_id' => $this->transactionId],
            ['rent_house_id' => $this->rentHouseId, 'rating' => $this->rating]
        );

        session()->flash('success', 'Rating saved successfully.');
        $this->formVisible = false; // Hide form after rating is submitted
    }

    public function render()
    {
        return view('livewire.rate-transaction');
    }
}
