<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticResource\Pages;
use App\Filament\Resources\StatisticResource\RelationManagers;
use App\Models\Statistic;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Layout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Value')
                ->translateLabel()
                ->maxValue(255)
                ->required(),
            TextInput::make('description')
                ->label('Description')
                ->translateLabel()
                ->maxValue(255)
                ->required(),
            Select::make('status')
                ->label('Status')
                ->translateLabel()
                ->options([
                    'Active' => __('Active'),
                    'Inactive' => __('Inactive'),
                ])
                ->required(),
            IconPicker::make('icon')
                ->sets(['heroicons', 'fontawesome-solid'])
                ->translateLabel()
                ->layout(Layout::ON_TOP),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Value'))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('Value'))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
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
            'index' => Pages\ListStatistics::route('/'),
            'create' => Pages\CreateStatistic::route('/create'),
            'edit' => Pages\EditStatistic::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('Statistics');
    }

    public static function getModelLabel(): string
    {
        return __('Statistics');
    }
}
