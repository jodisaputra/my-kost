<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('My Transaction')]
class MyTransaction extends Component
{
    use WithPagination;

    public function render()
    {
        $my_transactions = Transaction::where('user_id', Auth::id())
            ->with(['rent_house.features', 'rent_house.ratings']) // Load rent_house with its features and ratings
            ->paginate(10);

        // Calculate average and count ratings for each RentHouse
        $my_transactions->transform(function ($transaction) {
            $rentHouse = $transaction->rent_house;
            $ratings = $rentHouse->ratings;

            $averageRating = $ratings->avg('rating');
            $totalRatings = $ratings->count();

            // Add calculated properties to the rent_house relationship
            $rentHouse->average_rating = $averageRating;
            $rentHouse->total_ratings = $totalRatings;

            return $transaction;
        });

        return view('livewire.my-transaction', [
            'my_transactions' => $my_transactions
        ]);
    }

}
