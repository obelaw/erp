<?php

namespace Obelaw\Contacts\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\Contacts\Filament\Resources\ContactsResource\CreateContact;
use Obelaw\Contacts\Filament\Resources\ContactsResource\ListContact;
use Obelaw\Contacts\Models\Contact;
use Obelaw\Contacts\Models\Pin;
use Obelaw\ERP\ERPManager;

class ContactsResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Contacts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Information')
                        ->schema([
                            Split::make([
                                Section::make([
                                    Select::make('document_type')
                                        ->options(ContactType::class)
                                        ->required(),

                                    TextInput::make('name')->required(),

                                    TextInput::make('phone')->required(),

                                    TextInput::make('email'),

                                    TextInput::make('website'),
                                ]),
                                Section::make([
                                    FileUpload::make('image'),
                                ]),
                            ])->from('lg'),
                        ]),

                    Wizard\Step::make('Address')
                        ->schema([
                            Select::make('country_id')
                                ->label('country')
                                ->options(Pin::whereNull('parent_id')->pluck('name', 'id'))
                                ->searchable(),

                            // TODO: need optimize
                            Select::make('city_id')
                                ->label('city')
                                ->getSearchResultsUsing(function (string $search, Get $get): array {
                                    return Pin::where('parent_id', $get('country_id'))
                                        ->where('name', 'like', "%{$search}%")
                                        ->limit(50)
                                        ->pluck('name', 'id')
                                        ->toArray();
                                })
                                ->searchable(),

                            Select::make('state_id')
                                ->label('state')
                                ->getSearchResultsUsing(function (string $search = '', Get $get): array {
                                    return Pin::where('parent_id', $get('city_id'))
                                        ->where('name', 'like', "%{$search}%")
                                        ->limit(50)
                                        ->pluck('name', 'id')
                                        ->toArray();
                                })
                                ->searchable(),

                            Select::make('area_id')
                                ->label('area')
                                ->getSearchResultsUsing(function (string $search = '', Get $get): array {
                                    return Pin::where('parent_id', $get('state_id'))
                                        ->where('name', 'like', "%{$search}%")
                                        ->limit(50)
                                        ->pluck('name', 'id')
                                        ->toArray();
                                })
                                ->searchable(),

                            TextInput::make('label'),
                            TextInput::make('postcode'),
                            TextInput::make('street_line_1'),
                            TextInput::make('street_line_2'),
                            TextInput::make('phone_number'),
                            TextInput::make('is_main'),
                        ]),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('email')->searchable(),
            ])
            ->filters([
                SelectFilter::make('document_type')
                    ->multiple()
                    ->options(ContactType::class),
            ])
            ->actions(ERPManager::tableActions())
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListContact::route('/'),
            'create' => CreateContact::route('/create'),
            // 'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
