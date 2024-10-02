<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\CreateVendor;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\EditVendor;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource\ListVendor;
use Obelaw\ERP\Addons\Purchasing\Models\Vendor;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.purchasing.vendor.viewAny',
    title: 'Purchasing Vendors',
    description: 'Access on purchasing vendor at purchasing',
    permissions: [
        'permit.purchasing.vendor.create' => 'Can Create',
        'permit.purchasing.vendor.edit' => 'Can Edit',
        'permit.purchasing.vendor.delete' => 'Can Delete',
    ]
)]
class VendorResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.purchasing.vendor.viewAny',
        'can_create' => 'permit.purchasing.vendor.create',
        'can_edit' => 'permit.purchasing.vendor.edit',
        'can_delete' => 'permit.purchasing.vendor.delete',
    ];

    protected static ?string $slug = 'purchasing/vendors';
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
                                ->options(Account::pluck('name', 'id'))
                                ->searchable(),

                            Select::make('journal.account_payable')
                                ->label('Account Payable')
                                ->options(Account::pluck('name', 'id'))
                                ->searchable(),
                        ]),
                ])->skippable(),
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
