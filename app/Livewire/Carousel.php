<?php

namespace App\Livewire;

use App\Models\Advertise;
use Livewire\Component;

class Carousel extends Component
{
    public $advertisements;

    public function mount()
    {
        $this->advertisements = Advertise::with('media')
            ->get()
            ->map(function ($advertisement) {
                return [
                    'title' => $advertisement->title,
                    'description' => $advertisement->description,
                    'images' => $advertisement->getMedia('ad')->map->getUrl(),
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.carousel');
    }
}
