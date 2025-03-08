<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Sales\Filament\Clusters\SalesCluster;
use Obelaw\ERP\Addons\Sales\Filament\Resources\InvoiceResource\ListInvoice;
use Obelaw\ERP\Addons\Sales\Filament\Resources\InvoiceResource\ViewInvoice;
use Obelaw\ERP\Addons\Sales\Models\SalesInvoice;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.sales.invoice.viewAny',
    title: 'Sales Invoice',
    description: 'Access on sales invoice at sales',
    permissions: [
        'permit.sales.invoice.post' => 'Can Post',
    ]
)]
class InvoiceResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.sales.coupon.viewAny',
    ];

    protected static ?string $model = SalesInvoice::class;
    protected static ?string $cluster = SalesCluster::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-currency-pound';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serials.serial')->searchable(),

                TextColumn::make('order.serials.serial')
                    ->label('Order Serial')
                    ->searchable(),

                TextColumn::make('order.customer_name')
                    ->label('Customer Name')
                    ->searchable(),

                TextColumn::make('order.customer_phone')
                    ->label('Customer Phone')
                    ->searchable(),

                TextColumn::make('order.sub_total')
                    ->label('Sub Total')
                    ->money('EGP'),

                TextColumn::make('order.grand_total')
                    ->label('Grand Total')
                    ->money('EGP'),
            ])
            ->filters([
                // TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // FlatOrderItemsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvoice::route('/'),
            'view' => ViewInvoice::route('/{record}/view'),
        ];
    }
}
