<?php

namespace Obelaw\Sales\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Contacts\Models\Pin;

class CustomerAddressRelation extends RelationManager
{
    protected static ?string $title = 'Addresses';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'addresses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('country_id')
                    ->label('Country')
                    ->options(Pin::whereNull('parent_id')->pluck('name', 'id'))
                    ->searchable()
                    ->live()
                    ->required(),

                Select::make('city_id')
                    ->label('City')
                    ->options(fn(Get $get) => Pin::where('parent_id', $get('country_id'))->pluck('name', 'id'))
                    ->searchable()
                    ->live()
                    ->disabled(fn(Get $get): bool => !filled($get('country_id')))
                    ->required(),

                Select::make('state_id')
                    ->label('State')
                    ->options(fn(Get $get) => Pin::where('parent_id', $get('city_id'))->pluck('name', 'id'))
                    ->searchable()
                    ->live()
                    ->disabled(fn(Get $get): bool => !filled($get('city_id')))
                    ->required(),

                Select::make('area_id')
                    ->label('Area')
                    ->options(fn(Get $get) => Pin::where('parent_id', $get('state_id'))->pluck('name', 'id'))
                    ->searchable()
                    ->live()
                    ->disabled(fn(Get $get): bool => !filled($get('state_id')))
                    ->required(),

                Grid::make(3)
                    ->schema([
                        TextInput::make('label')
                            ->columnSpan(2)
                            ->required(),

                        TextInput::make('postcode'),
                    ]),


                // TextInput::make('label')
                //     ->required(),

                // TextInput::make('postcode'),

                TextInput::make('street_line_1')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('street_line_2'),

                TextInput::make('phone_number')->required(),
                // ...
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable(),

                TextColumn::make('street_line_1')
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->searchable(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions(actions: [
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
