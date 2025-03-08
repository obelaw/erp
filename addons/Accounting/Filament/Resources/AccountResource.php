<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Filament\Clusters\AccountingCluster;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\CreateAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\EditAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\ListAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\Pages\AccountTransactionsPage;
use Obelaw\ERP\Addons\Accounting\Lib\Services\Report\AccountTransactionReportService;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Facades\Permit;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.accounting.accounts.viewAny',
    title: 'Accounts',
    description: 'Access on accounts at accounting',
    permissions: [
        'permit.accounting.accounts.create' => 'Can Create',
        'permit.accounting.accounts.edit' => 'Can Edit',
        'permit.accounting.accounts.force_update_opening_balance' => 'Can Force Update Opening Balance',
        'permit.accounting.accounts.delete' => 'Can Delete',
    ]
)]
class AccountResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.accounting.accounts.viewAny',
        'can_create' => 'permit.accounting.accounts.create',
        'can_edit' => 'permit.accounting.accounts.edit',
        'can_delete' => 'permit.accounting.accounts.delete',
    ];

    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    // protected static ?string $navigationGroup = 'Accounting';
    protected static ?string $cluster = AccountingCluster::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('type_id')
                        ->label('Type')
                        ->required()
                        ->searchable()
                        ->options(AccountType::whereNotNull('parent_type')->get()->groupBy('parent.name')->map(fn($type) => $type->pluck('name', 'id'))),

                    TextInput::make('code')->required(),

                    TextInput::make('name')->required(),

                    TextInput::make('opening_balance')
                        ->integer()
                        ->default(0)
                        ->disabled(fn($record, Page $livewire) => Permit::can('permit.accounting.accounts.force_update_opening_balance') ? false : $livewire instanceof EditRecord && $record->opening_balance != 0),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup(Group::make('type.name'))
            ->columns([
                TextColumn::make('code')
                    ->searchable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('amount')
                    ->badge()
                    ->money('EGP')
                    ->state(function (Account $record): int {
                        return AccountTransactionReportService::make()
                            ->setAccount($record)
                            ->getCurrentBalance();
                    })
                    ->color(function (string $state): string {
                        if ($state > 0)
                            return 'success';

                        if ($state < 0)
                            return 'danger';

                        return 'gray';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('Transactions')
                    ->icon('heroicon-o-table-cells')
                    ->color(Color::Blue)
                    ->url(fn($record): string => route('filament.obelaw-twist.accounting.resources.accounts.transactions', ['record' => $record]))
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
            'index' => ListAccount::route('/'),
            'create' => CreateAccount::route('/create'),
            'edit' => EditAccount::route('/{record}/edit'),
            'transactions' => AccountTransactionsPage::route('/{record}/transactions'),
        ];
    }
}
