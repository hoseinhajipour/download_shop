<?php

namespace App\Components\Inc;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class LastProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::latest()->paginate(12);
        $this->dispatchBrowserEvent('contentChanged');
        return view('inc.last-products', ['products' => $products]);
    }
}
