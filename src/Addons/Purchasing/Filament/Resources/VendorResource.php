<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Obelaw\Accounting\Model\Account;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\Contacts\Filament\Resources\ContactsResource\CreateContact;
use Obelaw\Contacts\Filament\Resources\ContactsResource\ListContact;
use Obelaw\Contacts\Models\Contact;
use Obelaw\Contacts\Models\Pin;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\CreateVendor;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\EditVendor;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\ListVendor;
use Obelaw\ERP\Addons\Purchasing\Modules\Vendor;
use Obelaw\ERP\ERPManager;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Purchasing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Information')
                        ->schema([
                            Split::make([
                                Section::make([
                                    TextInput::make('name')->required(),

                                    TextInput::make('phone')->required(),

                                    TextInput::make('email'),

                                    TextInput::make('website'),
                                ]),
                                Section::make([
                                    FileUpload::make('image'),
                                ]),
                            ]),
                        ]),

                    Wizard\Step::make('Accounts')
                        ->schema([
                            Select::make('journal.account_receivable')
                                ->label('Account Receivable')
                                ->options(Account::where('type', 'accounts_receivable')->pluck('name', 'id'))
                                ->searchable(),

                            Select::make('journal.account_payable')
                                ->label('Account Payable')
                                ->options(Account::where('type', 'accounts_payable')->pluck('name', 'id'))
                                ->searchable(),
                        ]),
                ])->skippable(),
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
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
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
            'index' => ListVendor::route('/'),
            'create' => CreateVendor::route('/create'),
            'edit' => EditVendor::route('/{record}/edit'),
        ];
    }
}
