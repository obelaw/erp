<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource\CreateTransaction;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource\EditTransaction;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource\ListTransaction;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource\RelationManagers\JournalsRelation;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource\ViewTransaction;
use Obelaw\ERP\Addons\Accounting\Lib\Services\TransactionService;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Accounting\Models\Transaction;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.accounting.transaction.viewAny',
    title: 'Account Transaction',
    description: 'Access on Account Transaction at accounting',
    permissions: [
        'permit.accounting.transaction.create' => 'Can Create',
        'permit.accounting.transaction.edit' => 'Can Edit',
        'permit.accounting.transaction.delete' => 'Can Delete',
    ]
)]
class TransactionResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.accounting.transaction.viewAny',
        'can_create' => 'permit.accounting.transaction.create',
        'can_edit' => 'permit.accounting.transaction.edit',
        'can_delete' => 'permit.accounting.transaction.delete',
    ];

    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Accounting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Textarea::make('description'),

                    TextInput::make('added_at')
                        ->required()
                        ->type('date'),
                ]),

                Repeater::make('journals')
                    ->relationship()
                    ->schema([
                        Select::make('type')
                            ->options([
                                'debit' => 'Debit',
                                'credit' => 'Credit',
                            ])
                            ->required()
                            ->columnSpan(1),

                        Select::make('account_id')
                            ->label('account')
                            ->searchable()
                            ->options(Account::get()->groupBy('type.name')->map(fn($account) => $account->pluck('name', 'id')))
                            ->columnSpan(4),

                        TextInput::make('amount')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan(1),
                    ])
                    ->columns(6)

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('added_at')
                    ->searchable(),

                TextColumn::make('description')
                    ->searchable(),

                TextColumn::make('amount.debits.amount')
                    ->badge()
                    ->money('EGP')
                    ->color(function (string $state): string {
                        return 'gray';
                    }),

                TextColumn::make('amount.credits.amount')
                    ->badge()
                    ->money('EGP')
                    ->color(function (string $state): string {
                        return 'gray';
                    }),

                IconColumn::make('posted')
                    ->alignCenter()
                    ->state(function (Transaction $record): bool {
                        return TransactionService::make()->transaction($record)
                            ->posted();
                    })
                    ->boolean()

            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                // DeleteAction::make(),
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
            JournalsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransaction::route('/'),
            'create' => CreateTransaction::route('/create'),
            'view' => ViewTransaction::route('/{record}'),
            'edit' => EditTransaction::route('/{record}/edit'),
        ];
    }
}
