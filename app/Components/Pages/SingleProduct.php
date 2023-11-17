<?php

namespace App\Components\Pages;

use App\Models\Link;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SingleProduct extends Component
{
    public $Product;
    public $category;

    public function route()
    {
        return Route::get('/product/{slug}')
            ->name('product');
    }

    public function mount($slug)
    {
        $this->Product = Product::where("slug", "LIKE", "%$slug%")->with("links")->first();
        $this->category = ProductCategory::find($this->Product->category_id);
    }

    public function render()
    {
        return view('pages.single-product');
    }

    public function download_direct($link_id)
    {
        $link = Link::find($link_id);
        if ($link->type == "direct") {
            if (Auth::check()) {
                if (Auth::user()->SubscriptionDays() > 0) {
                    $this->Product->direct_download_count++;
                    $this->Product->save();

                    return Redirect::to($link->url);
                } else {
                    $this->emit('openModal', 'modal.buy-membership-modal');
                }
            } else {
                $this->emit('openModal', 'modal.buy-membership-modal');
            }
        } else {
            $this->Product->free_download_count++;
            $this->Product->save();
            return Redirect::to($link->url);
        }

    }

}
