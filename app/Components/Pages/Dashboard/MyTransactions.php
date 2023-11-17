<?php

namespace App\Components\Pages\Dashboard;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class MyTransactions extends Component
{
    use WithPagination;

    public function route()
    {
        return Route::get('/profile/my-transactions')
            ->middleware('auth')
            ->name('mytransactions');
    }

    public function render()
    {
        $transactions = Transaction::where("user_id", Auth::user()->id)->paginate(12);
        return view('pages.dashboard.my-transactions', ['transactions' => $transactions])
            ->layout('layouts.dashboard');
    }
}
