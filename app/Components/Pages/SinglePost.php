<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use TCG\Voyager\Models\Post;

class SinglePost extends Component
{
    public $post;

    public function route()
    {
        return Route::get('/post/{slug}')
            ->name('post');
    }

    public function mount($slug)
    {
        $this->post = Post::where("slug", "LIKE", "%$slug%")->first();
    }

    public function render()
    {
        return view('pages.single-post');
    }
}
