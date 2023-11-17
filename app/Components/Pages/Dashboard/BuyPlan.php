<?php

namespace App\Components\Pages\Dashboard;

use App\Models\Gateway;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class BuyPlan extends Component
{
    public $plans = [];
    public $plan_select;
    public $gatways = [];
    public $gatway_select;

    public function mount()
    {
        $this->plans = Plan::where("status", "active")->get();
        $this->plan_select = $this->plans[0]->id;
        $this->gatways = Gateway::where("status", "active")->get();
        $this->gatway_select = $this->gatways[0]->id;
    }

    public function route()
    {
        return Route::get('/dashboard/buyplan')
            ->name('dashboard.buyPlan')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.dashboard.buy-plan')->layout('layouts.dashboard');
    }
}
