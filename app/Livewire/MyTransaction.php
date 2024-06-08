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
        $my_transactions = Transaction::where('user_id', Auth::user()->id)->with('rent_house.features')->paginate(10);
//        header('Content-Type: application/json');
//        echo json_encode($my_transactions);
//        die;
        return view('livewire.my-transaction', [
            'my_transactions' => $my_transactions
        ]);
    }
}
