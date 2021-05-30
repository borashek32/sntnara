<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    public $img;
    public $categories;
    public $category_id;
    public $post;
    public $isOpen = 0;

    use WithFileUploads;
    use WithPagination;

    protected $rules = [
        'post.category_id'   => 'required',
        'post.title'   => 'required',
        'post.body'    => 'required',
        'post.img'     => 'image|max:1024'
    ];

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('admin.posts.edit');
    }

    public function store()
    {
        $this->validate();

        Post::updateOrCreate(['id' => $this->post_id], [
            'category_id'    => $this->category_id,
            'title'    => $this->title,
            'body'     => $this->body,
            'img'      => $this->img->hashName(),
        ]);

        if(!empty($this->img)) {
            $this->img->store('public/docs');
        }

        session()->flash('message',
            $this->post_id ? 'Пост успешно обновлен.' : 'Пост успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id    = $id;
        $this->category_id      = $post->category_id;
        $this->title      = $post->title;
        $this->body       = $post->body;
        $this->img        = $post->img;
        $this->openModal();
    }
}
