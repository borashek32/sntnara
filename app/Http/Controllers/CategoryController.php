<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories($id)
    {
        $category = Category::find($id);
        $posts = Post::where('category_id', $id)
            ->latest()
            ->simplePaginate(5);

        return view('site/category-one', compact( 'category', 'posts'));
    }
}
