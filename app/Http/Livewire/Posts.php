<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Posts extends Component
{
    public $title, $body, $post_id, $search, $img;
    public $isOpen = 0;

    use WithFileUploads;
    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->latest()->paginate(5);
        return view('livewire.posts', ['posts' => $posts]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }

    public function store()
    {
        $this->validate([
            'title'   => 'required',
            'body'    => 'required',
            'img'     => 'image|max:1024'
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
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
        $this->title      = $post->title;
        $this->body       = $post->body;
        $this->img        = $post->img;
        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Пост успешно удален.');
    }
}
