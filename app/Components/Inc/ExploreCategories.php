<?php

namespace App\Components\Inc;

use App\Models\ProductCategory;
use Livewire\Component;

class ExploreCategories extends Component
{
    public function render()
    {
        $categories = ProductCategory::all();
        return view('inc.explore-categories', ['categories' => $categories]);
    }
}
