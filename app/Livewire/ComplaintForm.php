<?php

namespace App\Livewire;

use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ComplaintForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->translateLabel()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->translateLabel()
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Select::make('city_id')
                    ->translateLabel()
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\Textarea::make('location')
                    ->translateLabel()
                    ->columnSpanFull(),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->translateLabel()
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->translateLabel()
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'resolved' => 'Resolved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('resolution')->translateLabel(),
                Forms\Components\DateTimePicker::make(
                    'resolved_at',
                )->translateLabel(),

                SpatieMediaLibraryFileUpload::make('photo')
                    ->label('Photo')
                    ->translateLabel()
                    ->collection('Complaints')
                    ->rules('image', 'max:1024')
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->model(Complaint::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Complaint::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.complaint-form');
    }
}
