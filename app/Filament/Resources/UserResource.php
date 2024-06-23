<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{

    protected static ?int $navigationSort = 2;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->translateLabel(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')                    ->confirmed()
                    ->maxLength(255)
                    ->translateLabel(),

                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->label('password confirmation')
                    ->translateLabel()
                    ->dehydrated(false),



                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->label('Roles')
                    ->translateLabel()
                ,

                Forms\Components\Select::make('city_id')
                    ->label('City')
                    ->translateLabel()
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('city.name')
                    ->label('City')
                    ->sortable()
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('Y-m-d')
                    ->sortable()
                    ->label('Date')
                    ->translateLabel(),

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
                Tables\Actions\DeleteAction::make(),

            ])

            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {

        return [
            //    RelationManagers\CitiesRelationManager::class,
        ];

    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }


    public static function getPluralModelLabel(): string
    {
        return __('users');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('users');
    }


    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var User $record */

        return [
            __('Name') => $record->name,
        ];
    }


    public static function getModelLabel(): string
    {
        return __('user');
    }
}
