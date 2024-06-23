<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintResource\Pages;
use App\Filament\Resources\ComplaintResource\RelationManagers;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                Forms\Components\Textarea::make('resolution')
                    ->translateLabel(),
                Forms\Components\DateTimePicker::make('resolved_at')
                    ->translateLabel(),

                SpatieMediaLibraryFileUpload::make('photo')
                    ->label('Photo')
                    ->translateLabel()
                    ->collection('Complaints')
                    ->rules('image', 'max:1024')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('resolved_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('complaints');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('complaints');
    }
    public static function getModelLabel(): string
    {
        return __('complaint');
    }
}
