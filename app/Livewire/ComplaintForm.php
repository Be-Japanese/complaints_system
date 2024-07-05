<?php

namespace App\Livewire;

use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ComplaintForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $submitted = false;

    public function mount(): void
    {
        // GET title from url http://localhost/complaint?title=dfsdfjdd

        $this->form->fill([
            'title' => request()->get('title'),
            'category_id' => request()->get('category'),
        ]);

        //        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    TextInput::make('title')
                        ->translateLabel()
                        ->required()
                        ->maxLength(255),
                    Select::make('category_id')
                        ->label('Category')
                        ->translateLabel()
                        ->relationship('category', 'name')
                        ->required(),
                    Textarea::make('description')
                        ->translateLabel()
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('name')
                        ->translateLabel()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone_number')
                        ->translateLabel()
                        ->tel()
                        ->maxLength(255),
                    Select::make('city_id')
                        ->translateLabel()
                        ->relationship('city', 'name')
                        ->required(),
                    TextInput::make('address')
                        ->translateLabel()
                        ->maxLength(255),
                    Textarea::make('location')
                        ->translateLabel()
                        ->columnSpanFull(),
                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Photo')
                        ->translateLabel()
                        ->collection('Complaints')
                        ->rules('image', 'max:1024')
                        ->columnSpanFull(),
                ]),
            ])
            ->statePath('data')
            ->model(Complaint::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Complaint::create($data);

        $this->form->model($record)->saveRelationships();

        $this->submitted = true;
    }

    public function render(): View
    {
        return view('livewire.complaint-form');
    }
}
