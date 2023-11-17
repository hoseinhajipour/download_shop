<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Gateway extends Component
{

    public function route()
    {
        return Route::get('/gateway')
            ->name('gateway');
    }
    public function render()
    {
        return view('pages.gateway');
    }
}
