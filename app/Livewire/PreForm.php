<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class PreForm extends Component
{
    public $title;
    public $categorise_form;

    public function save()
    {
        $this->validate(
            [
                'title' => 'required|min:3',
            ],
            [
                'title' => 'يجب أن يكون عدد الحروف أكبر من 3',
            ],
        );

        return redirect()->route('new-complaint', [
            'title' => $this->title,
            'category' => $this->categorise_form,
        ]);
    }
    public function render()
    {
        $categorise = Category::all();

        return view('livewire.pre-form', [
            'categorise' => $categorise,
        ]);
    }
}
