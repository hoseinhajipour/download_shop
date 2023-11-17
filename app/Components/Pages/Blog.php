<?php

namespace App\Components\Pages;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class Blog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function route()
    {
        return Route::get('/blog')
            ->name('blog');
    }

    public function render()
    {
        $posts = Post::where("status", "PUBLISHED")->latest()->paginate(12);
        $categories = Category::all();
        return view('pages.blog', ["posts" => $posts, 'categories' => $categories]);
    }
}
