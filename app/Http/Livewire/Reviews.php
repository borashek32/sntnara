<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class Reviews extends Component
{
    public $name, $review, $review_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $reviews  = Review::where('name', 'LIKE', $search)
            ->orWhere('review', 'LIKE', $search)
            ->latest()->paginate(5);
        return view('livewire.reviews.reviews', ['reviews' => $reviews]);
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
        $this->name = '';
        $this->review = '';
        $this->review_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'review' => 'required',
        ]);

        Review::updateOrCreate(['id' => $this->review_id], [
            'name' => $this->name,
            'body' => $this->review
        ]);

        session()->flash('message',
            $this->review_id ? 'Отзыв успешно обновлен.' : 'Отзыв успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $this->review_id = $id;
        $this->name = $review->name;
        $this->review = $review->review;
        $this->openModal();
    }

    public function delete($id)
    {
        Review::find($id)->delete();
        session()->flash('message', 'Отзыв успешно удален.');
    }
}
