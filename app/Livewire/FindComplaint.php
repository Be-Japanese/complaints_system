<?php

namespace App\Livewire;

use App\Models\Complaint;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FindComplaint extends Component
{
    #[Validate('required|numeric')]
    public $phone;

    public $complaints = [];

    public function find(): void
    {
        $this->validate();

        $this->complaints = Complaint::where('phone_number', $this->phone)
            ->orderBy('updated_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.find-complaint');
    }
}
