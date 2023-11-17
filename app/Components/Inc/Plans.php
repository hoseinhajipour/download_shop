<?php

namespace App\Components\Inc;

use App\Models\Plan;
use Livewire\Component;

class Plans extends Component
{
    public function render()
    {
        $plans = Plan::all();
        return view('inc.plans', ["plans" => $plans]);
    }

    public function buy($id)
    {
        return $this->redirect(route('checkout', ["plan_id" => $id]));
    }
}
