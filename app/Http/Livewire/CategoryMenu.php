<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryMenu extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories.category-menu');
    }
}
