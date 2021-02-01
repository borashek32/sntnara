<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryMenu extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.category-menu');
    }
}
