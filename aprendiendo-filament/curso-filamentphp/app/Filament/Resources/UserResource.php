<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section; //🍱 Importar la clase Section para poder crear secciones en el formulario
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = "Employees"; /* C01: Cambiar nombre del recurso */
    protected static ?string $navigationGroup = 'Employees Management'; /* C08: Cambiar grupo de navegación */
    protected static ?string $navigationIcon = 'heroicon-o-user-group'; /* C07: Cambiar icono del recurso */
    protected static ?int $navigationSort = 2; // C09: Cambiar orden de navegación
    /* C02: Agregar nuevos campos a la tabla Users */
    public static function form(Form $form): Form
    {
        /* C03: Agregar sección a formulario */
        /* C06: 👀 Agregar los campos al $fillable en el modelo User */
        return $form
            ->schema([
                Section::make('Personal Info')
                    ->columns(3) // 👀 Especificar el número de columnas (recordar que es resonsive, si tengo el navegador a la mita de la pantalla no aparecerá en 3 columnas)
                    ->description('This is the personal information of the user')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->hiddenOn('edit') //Se oculta el input en el formulario de edición
                            ->required()
                            ->maxLength(255),
                    ]),
                /* C04: Agregar nueva sección al formulario con una relación */
                Section::make('Address Info') // 🍱 Crear una nueva sección
                    ->columns(3) // 👀 Especificar el número de columnas (recordar que es resonsive, si tengo el navegador a la mita de la pantalla no aparecerá en 3 columnas)
                    ->description('This is the address information of the user')
                    ->schema([

                        //Creación de campo de selección de Pais
                        Forms\Components\Select::make('country_id') // Seleccionar el campo country_id
                            ->relationship(name: 'country', titleAttribute: 'name') // Relacionar con la tabla country y mostrar el campo name
                            ->searchable() // Hacerlo buscable
                            ->preload() // Precargar los datos
                            ->live() // Actualizar en tiempo real
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null); // Limpiar el campo state_id
                                $set('city_id', null); // Limpiar el campo city_id
                            })
                            ->required(), // Hacerlo requerido


                        //Creación de campo de selección de Estado
                        Forms\Components\Select::make('state_id') /* C05: Select en base al Pais */
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable() // Hacerlo buscable
                            ->preload() // Precargar los datos
                            ->live() // Actualizar en tiempo real
                            ->afterStateUpdated(function (Set $set) {
                                $set('city_id', null); // Limpiar el campo city_id
                            })
                            ->required(), // Hacerlo requerido


                        //Creación de campo de selección de Ciudad
                        Forms\Components\Select::make('city_id') /* C05: Select en base al Pais */
                            ->options(fn(Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable() // Hacerlo buscable
                            ->preload() // Precargar los datos
                            ->live() // Actualizar en tiempo real
                            ->required(), // Hacerlo requerido

                        Forms\Components\TextInput::make('address')
                            ->required(),
                        Forms\Components\TextInput::make('postal_code')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('postal_code')
                    ->sortable()
                    ->searchable() // Para que el campo sea buscable
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), //Ocultar la columna por defecto

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
