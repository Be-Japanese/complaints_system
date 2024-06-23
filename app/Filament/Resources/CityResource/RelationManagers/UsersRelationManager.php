<?php

namespace App\Filament\Resources\CityResource\RelationManagers;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;


class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';



    public function form(Form $form): Form
    {
        return UserResource::form($form);

    }

    public function table(Table $table): Table
    {
        return UserResource::table($table)
            ->headerActions([
                Tables\Actions\AssociateAction::make()
                    ->recordSelectSearchColumns(['name', 'email'])
                    ->preloadRecordSelect()
                    ->icon('heroicon-o-plus-circle')->recordTitleAttribute('name')
                    ,

            ])
            ->actions([
                Tables\Actions\DissociateAction::make()
            ])
            ->groupedBulkActions([
                Tables\Actions\DissociateBulkAction::make(),
            ])->inverseRelationship('city')->emptyStateActions([
                Tables\Actions\AssociateAction::make()
                    ->preloadRecordSelect(),
            ]);
    }

    public static function getPluralModelLabel(): string
    {
        return __('users'); // Changed to plural for consistency
    }

    public static function getModelLabel(): string
    {
        return __('user'); // Singular label remains the same
    }


}
