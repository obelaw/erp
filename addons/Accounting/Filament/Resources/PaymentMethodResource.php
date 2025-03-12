<?php

namespace Obelaw\Accounting\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Accounting\Filament\Clusters\AccountingCluster;
use Obelaw\Accounting\Filament\Resources\PaymentMethodResource\ListPaymentMethod;
use Obelaw\Accounting\Models\Account;
use Obelaw\Accounting\Models\PaymentMethod;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.accounting.payment_method.viewAny',
    title: 'Payment Methods',
    description: 'Access on payment methods at accounting',
    permissions: [
        'permit.accounting.payment_method.create' => 'Can Create',
        'permit.accounting.payment_method.edit' => 'Can Edit',
        'permit.accounting.payment_method.delete' => 'Can Delete',
    ]
)]
/**
 * Represents a Price List resource for Filament.
 *
 * This class defines the form, table, and other aspects of how Price Lists
 * are managed within the Filament admin panel.
 */
class PaymentMethodResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.accounting.payment_method.viewAny',
        'can_create' => 'permit.accounting.payment_method.create',
        'can_edit' => 'permit.accounting.payment_method.edit',
        'can_delete' => 'permit.accounting.payment_method.delete',
    ];

    protected static ?string $cluster = AccountingCluster::class;
    protected static ?string $model = PaymentMethod::class;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Configuration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('journal_id')
                        ->label('Journal Account')
                        ->searchable()
                        ->options(Account::get()->groupBy('type.name')->map(fn($account) => $account->pluck('name', 'id'))),

                    TextInput::make('name')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Toggle::make('is_active'),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('journal.name')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->alignCenter()
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
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
            'index' => ListPaymentMethod::route('/'),
        ];
    }
}
