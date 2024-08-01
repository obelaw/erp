<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\CreatePurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\EditPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\ListPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\RelationManagers\OrderItemsRelation;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\ViewPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Modules\PurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Modules\Vendor;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Purchasing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Vendor Section')
                    ->description('You must select vendor for this purchase')
                    ->icon('heroicon-m-user')
                    ->schema([
                        Select::make('vendor_id')
                            ->label('Vendor')
                            ->options(Vendor::pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ]),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serials.serial')->searchable(),
                TextColumn::make('vendor.name')
                    ->label('Vendor Name')
                    ->searchable(),
                TextColumn::make('vendor.phone')
                    ->label('Vendor Phone')
                    ->searchable(),
                TextColumn::make('sub_total'),
                TextColumn::make('grand_total'),
            ])
            ->filters([
                //
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
            OrderItemsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPurchaseOrder::route('/'),
            'create' => CreatePurchaseOrder::route('/create'),
            'edit' => EditPurchaseOrder::route('/{record}/edit'),
            'view' => ViewPurchaseOrder::route('/{record}/view'),
        ];
    }
}
