<?php

namespace App\Components\Pages\Dashboard;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Dashboard extends Component
{
    public function route()
    {
        return Route::get('/dashboard')
            ->name('dashboard')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.dashboard.dashboard')->layout('layouts.dashboard');
    }
}
