<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Buyplan extends Component
{
    public function route()
    {
        return Route::get('/buy-plan')
            ->name('BuyPlan');
    }
    public function render()
    {
        return view('pages.buyplan');
    }
}
