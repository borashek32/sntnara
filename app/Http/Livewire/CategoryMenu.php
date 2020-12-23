<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryMenu extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-menu', compact('categories'));
    }
}
