<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PostOne extends Component
{
    public $post;
    public $categories;

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.post')->layout('layouts.site');
    }
}
