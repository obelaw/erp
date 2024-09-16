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
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\CreatePurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\EditPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\ListPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\RelationManagers\OrderItemsRelation;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\ViewPurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Lib\Enums\POStatusEnum;
use Obelaw\ERP\Addons\Purchasing\Models\PaymentTerm;
use Obelaw\ERP\Addons\Purchasing\Models\PurchaseOrder;
use Obelaw\ERP\Addons\Purchasing\Models\Vendor;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;
use stdClass;

#[Permissions(
    id: 'permit.purchasing.po.viewAny',
    title: 'Purchase Order',
    description: 'This rules',
    permissions: [
        'permit.purchasing.po.create' => 'Can Create',
        'permit.purchasing.po.edit' => 'Can Edit',
        'permit.purchasing.po.delete' => 'Can Delete',
    ]
)]
class PurchaseOrderResource extends Resource
{
    // use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.purchasing.po.viewAny',
        'can_create' => 'permit.purchasing.po.create',
        'can_edit' => 'permit.purchasing.po.edit',
        'can_delete' => 'permit.purchasing.po.delete',
    ];

    protected static ?string $slug = 'purchasing/orders';

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

                        Select::make('payment_term_id')
                            ->label('Payment term')
                            ->options(PaymentTerm::isActive()->pluck('name', 'id'))
                            ->searchable(),
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

                TextColumn::make('status')
                    ->badge()
                    ->alignCenter()
                    ->state(function ($record): string {
                        return match ($record->status) {
                            POStatusEnum::QUOTATION() => 'Quotation',
                            POStatusEnum::PROCESSING() => 'Processing',
                            POStatusEnum::DONE() => 'Done',
                        };
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Quotation' => 'gray',
                        'Processing' => 'yallow',
                        'Done' => 'success',
                    }),


                TextColumn::make('items_count')
                    ->counts('items'),


                // TextColumn::make('grand_total'),

                TextColumn::make('created_at'),
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
