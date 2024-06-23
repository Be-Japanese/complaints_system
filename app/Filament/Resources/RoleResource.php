<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Models\Role;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class RoleResource extends Resource
{

    protected static ?int $navigationSort = 3;

    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->translateLabel()
                            ->label('Name')
                            ->maxLength(255),

                        Forms\Components\CheckboxList::make('permissions')
                            ->label('Permissions')
                            ->translateLabel()
                            ->columns(4)
                            ->gridDirection('row')
                            ->bulkToggleable()
                            ->relationship('permissions', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => __($record->name))

                    ])

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->visible(fn (Role $role) => $role->name == 'Super Admin')

            ])

            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('roles');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('users');
    }

    public static function getModelLabel(): string
    {
        return __('role');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var User $record */

        return [
            __('Name') => $record->name,
        ];
    }
}
