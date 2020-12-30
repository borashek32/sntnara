<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $posts = Post::where('category_id', $id)->latest()->simplePaginate(1);

        return view('site/category-one', compact('categories', 'category', 'posts'));
    }
}
