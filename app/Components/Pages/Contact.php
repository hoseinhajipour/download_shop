<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Contact extends Component
{
    public function route()
    {
        return Route::get('/Contact')
            ->name('Contact');
    }
    public function render()
    {
        return view('pages.contact');
    }
}
