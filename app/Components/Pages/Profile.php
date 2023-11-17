<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Profile extends Component
{
    public function route()
    {
        return Route::get('/profile')
            ->name('profile')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.profile');
    }
}
