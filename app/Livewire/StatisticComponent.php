<?php

namespace App\Livewire;

use App\Models\Statistic;
use Livewire\Component;

class StatisticComponent extends Component
{
    public function render()
    {
        $statistics = Statistic::whereStatus('Active')->get();
        return view('livewire.statistic', [
            'statistics' => $statistics,
        ]);
    }
}
