<?php

namespace App\Components\Pages;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category;
    public $search = '';
    public function route()
    {
        return Route::get('/category/{slug}')
            ->name('category');
    }

    public function mount($slug)
    {
        $this->category = ProductCategory::where("slug", "LIKE", "%$slug%")->first();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where("title", "like", "%{$this->search}%");
        }
        $products = $query->where("category_id", $this->category->id)->paginate(12);

        $this->dispatchBrowserEvent('contentChanged');
        return view('pages.category', ['products' => $products]);
    }
}
