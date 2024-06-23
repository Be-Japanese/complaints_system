<?php

namespace App\Filament\Resources;

use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel
{

    case Active = 'Active';
    case Inactive = 'Inactive';

    public function getLabel(): ?string
    {
        return __($this->name);

    }
}
