<?php

namespace App\Livewire;

use App\Models\Complaint;
use Dotswan\MapPicker\Fields\Map;
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
use Filament\Forms\Set;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ComplaintForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $submitted = false;
    public $isNote = true;

    public function mount(): void
    {
        // GET title from url http://localhost/complaint?title=dfsdfjdd

        if (request()->get('category') == 1) {
            $this->isNote = false;
        }

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
                        ->hidden(!$this->isNote)
                        ->required($this->isNote),
                    Textarea::make('description')
                        ->translateLabel()
                        ->required($this->isNote)
                        ->columnSpanFull(),
                    TextInput::make('name')
                        ->translateLabel()
                        ->hidden(!$this->isNote)
                        ->required($this->isNote)
                        ->maxLength(255),
                    TextInput::make('phone_number')
                        ->translateLabel()
                        ->hidden(!$this->isNote)
                        ->tel()
                        ->maxLength(255),
                    Select::make('city_id')
                        ->translateLabel()
                        ->hidden(!$this->isNote)
                        ->relationship('city', 'name')
                        ->required($this->isNote),
                    TextInput::make('address')
                        ->translateLabel()
                        ->hidden(!$this->isNote)
                        ->maxLength(255),
                    Textarea::make('location')
                        ->translateLabel()
                        ->hidden(!$this->isNote)
                        ->columnSpanFull(),
                    Map::make('location')
                        ->label('Location')
                        ->columnSpanFull()
                        ->hidden(!$this->isNote)
                        ->default([
                            'lat' => 40.4168,
                            'lng' => -3.7038,
                        ])
                        /* ->afterStateUpdated(function (
                            Set $set,
                            ?array $state,
                        ): void {
                            $set('latitude', $state['lat']);
                            $set('longitude', $state['lng']);
                        })*/
                        /*->afterStateHydrated(function (
                            $state,
                            $record,
                            Set $set,
                        ): void {
                            $set('location', [
                                'lat' => $record->latitude,
                                'lng' => $record->longitude,
                            ]);
                        })*/
                        ->extraStyles([
                            'min-height: 20vh',
                            'border-radius: 10px',
                        ])
                        ->liveLocation()
                        ->showMarker()
                        ->markerColor('#22c55eff')
                        ->showFullscreenControl()
                        ->showZoomControl()
                        ->draggable()
                        ->tilesUrl(
                            'https://tile.openstreetmap.de/{z}/{x}/{y}.png',
                        )
                        ->zoom(15)
                        ->detectRetina()
                        ->showMyLocationButton()
                        ->extraTileControl([])
                        ->extraControl([
                            'zoomDelta' => 1,
                            'zoomSnap' => 2,
                        ]),
                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Photo')
                        ->hidden(!$this->isNote)
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
