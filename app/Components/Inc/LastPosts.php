<?php

namespace App\Components\Inc;

use Livewire\Component;
use TCG\Voyager\Models\Post;

class LastPosts extends Component
{
    public function render()
    {
        $posts = Post::where("status", "PUBLISHED")->latest()->get()->take(4);
        return view('inc.last-posts', ["posts" => $posts]);
    }
}
