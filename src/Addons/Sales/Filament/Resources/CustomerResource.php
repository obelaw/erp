<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\Pages\CreateCustomer;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\Pages\EditCustomer;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\Pages\ListCustomers;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\RelationManagers\CustomerAddressRelation;
use Obelaw\ERP\Addons\Sales\Models\Customer;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Sales';

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

                                    TextInput::make(name: 'phone')->required(),

                                    TextInput::make('email'),

                                    TextInput::make('website'),
                                ]),
                                Section::make([
                                    FileUpload::make('image'),
                                ]),
                            ]),
                        ]),

                    // TODO build relationship with account
                    Wizard\Step::make('Accounts')
                        ->schema([
                            Select::make('journal.account_receivable')
                                ->label('Account Receivable')
                                ->options(Account::isType('Accounts Receivable')->pluck('name', 'id'))
                                ->searchable(),

                            Select::make('journal.account_payable')
                                ->label('Account Payable')
                                ->options(Account::isType('Accounts Payable')->pluck('name', 'id'))
                                ->searchable(),
                        ]),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->defaultImageUrl(asset('/vendor/obelaw/assets/images/default_user_avatar.svg'))
                    ->circular(),

                TextColumn::make('name')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('email')->searchable(),
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
            CustomerAddressRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
