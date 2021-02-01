<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
    public $post_id, $body, $user_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $comments  = Comment::all();
        return view('livewire.comments', ['comments' => $comments])->layout('layouts.app');
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
        $this->body = '';
        $this->comment_id = '';
    }

    public function store()
    {
        $this->validate([
            'body' => 'required',
        ]);

        Comment::updateOrCreate(['id' => $this->comment_id], [
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->comment_id ? 'Комментарий успешно обновлен.' : 'Отзыв успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $this->comment_id = $id;
        $this->body = $comment->body;
        $this->openModal();
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        session()->flash('message', 'Комментарий успешно удален.');
    }
}
