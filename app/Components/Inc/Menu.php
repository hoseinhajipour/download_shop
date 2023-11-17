<?php

namespace App\Components\Inc;

use App\Models\ProductCategory;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        $categories = ProductCategory::all();
        return view('inc.menu', ['categories' => $categories]);
    }
}
