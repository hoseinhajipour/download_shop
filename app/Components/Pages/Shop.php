<?php

namespace App\Components\Pages;

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Shop extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function route()
    {
        return Route::get('/shop')
            ->name('shop');
    }
    public function mount(Request $request)
    {
        if ($request->q) {
            $this->search =$request->q;
        }
    }



    public function render()
    {
        $products = Product::where("title", "LIKE", "%$this->search%")
            ->OrWhere("body", "LIKE", "%$this->search%")
            ->paginate(12);

        $this->dispatchBrowserEvent('contentChanged');

        return view('pages.shop', ['products' => $products]);
    }
}
