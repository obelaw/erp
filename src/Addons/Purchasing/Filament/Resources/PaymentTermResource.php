<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
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
use Obelaw\ERP\Addons\Purchasing\Filament\Clusters\PurchasingConfiguration;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PaymentTermResource\ListPaymentTerm;
use Obelaw\ERP\Addons\Purchasing\Models\PaymentTerm;

class PaymentTermResource extends Resource
{
    protected static ?string $model = PaymentTerm::class;

    protected static ?string $cluster = PurchasingConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Purchasing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')->required(),

                    Textarea::make('description'),

                    TextInput::make('due_days')->required(),

                    TextInput::make('discount_percentage'),

                    TextInput::make('discount_due_days'),

                    Toggle::make('is_active'),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('due_days'),

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
            'index' => ListPaymentTerm::route('/'),
            // 'create' => CreateVendor::route('/create'),
            // 'edit' => EditVendor::route('/{record}/edit'),
        ];
    }
}
