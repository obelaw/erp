<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

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
use Obelaw\ERP\Addons\Accounting\Filament\Clusters\Configuration;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PaymentMethodResource\ListPaymentMethod;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Accounting\Models\PaymentMethod;

/**
 * Represents a Price List resource for Filament.
 *
 * This class defines the form, table, and other aspects of how Price Lists
 * are managed within the Filament admin panel.
 */
class PaymentMethodResource extends Resource
{
    protected static ?string $cluster = Configuration::class;
    protected static ?string $model = PaymentMethod::class;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

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
