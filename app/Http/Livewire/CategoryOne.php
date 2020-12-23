<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;

class CategoryOne extends Component
{
    use WithPagination;

    public $category;

    public function mount($id)
    {
        $this->category = Category::find($id);
    }

    public function render(Category $id)
    {
        $posts  = Post::where('category_id', '=', $id)
            ->latest()
            ->paginate(4);
        return view('livewire.category-one', ['posts' => $posts])->layout('layouts.site');
    }
}
