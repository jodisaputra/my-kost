<?php

use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/midtrans/notification', [MidtransController::class, 'notificationHandler']);

Route::get('/', \App\Livewire\HomePage::class);
Route::get('/rents', \App\Livewire\RentHousePage::class);
Route::get('/rents/{slug}', \App\Livewire\RentHouseDetailPage::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\LoginPage::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\RegisterPage::class);
//    Route::get('/forgot', \App\Livewire\Auth\ForgotPasswordPage::class)->name('password.request');
//    Route::get('/reset/{token}', \App\Livewire\Auth\ResetPasswordPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/');
    });

    Route::get('/book-now/{slug}', \App\Livewire\TransactionPage::class);
    Route::get('/my-transactions', \App\Livewire\MyTransaction::class);
});
