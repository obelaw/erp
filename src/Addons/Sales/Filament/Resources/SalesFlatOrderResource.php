<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Lib\Services\PricelistService;
use Obelaw\ERP\Addons\Accounting\Models\PaymentMethod;
use Obelaw\ERP\Addons\Accounting\Models\Pricelist;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Addons\Contacts\Models\Address;
use Obelaw\ERP\Addons\Sales\Filament\RelationManagers\FlatOrderItemsRelation;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource\CreateSalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource\EditSalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource\ListSalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource\ViewSalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Models\Customer;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.sales.orders.viewAny',
    title: 'Sales Coupon',
    description: 'Access on sales coupon at sales',
    permissions: [
        'permit.sales.orders.create' => 'Can Create',
        'permit.sales.orders.edit' => 'Can Edit',
        'permit.sales.orders.delete' => 'Can Delete',
    ]
)]
class SalesFlatOrderResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.sales.orders.viewAny',
        'can_create' => 'permit.sales.orders.create',
        'can_edit' => 'permit.sales.orders.edit',
        'can_delete' => 'permit.sales.orders.delete',
    ];

    protected static ?string $model = SalesFlatOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Sales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make('Cart')
                        ->description('The items you have selected for purchase')
                        ->icon('heroicon-m-shopping-bag')
                        ->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->schema([
                                    Select::make('name')
                                        ->label('Product')
                                        ->required()
                                        ->live()
                                        ->options(Product::all()->pluck('name', 'name'))
                                        ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                            if ($state) {
                                                $product = Product::where('name', $state)->first();

                                                $productPrice = PricelistService::make()
                                                    ->setPricelistId($get('../../pricelist_id'))
                                                    ->getProductPrice($product);

                                                $set('sku', $product->sku);
                                                $set('unit_price', $productPrice);
                                                $set('row_price', $productPrice);
                                            }

                                            if (!$state)
                                                $set('sku', null);
                                        })
                                        ->searchable()
                                        ->columnSpan(4),

                                    TextInput::make('sku')
                                        ->label('SKU')
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(2),

                                    TextInput::make('quantity')
                                        ->label('Quantity')
                                        ->required()
                                        ->live()
                                        ->numeric()
                                        ->default(1)
                                        ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                            $set('row_price', $get('unit_price') * $state);
                                        })
                                        ->columnSpan(2),

                                    TextInput::make('unit_price')
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(2),

                                    TextInput::make('row_price')
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(2),
                                ])
                                ->columns(6)
                        ]),
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Order Section')

                        ->schema([
                            Select::make('pricelist_id')
                                ->label('Pricelist')
                                ->options(Pricelist::pluck('name', 'id'))
                                ->live(),
                        ]),

                    Section::make('Customer Section')
                        ->schema([
                            Select::make('customer_id')
                                ->label('Customer')
                                ->relationship(name: 'customer', titleAttribute: 'name')
                                ->options(Customer::pluck('name', 'id'))
                                ->searchable()
                                ->live()
                                ->required()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->required(),
                                    TextInput::make('phone')
                                        ->required(),
                                ]),

                            Select::make('address_id')
                                ->label('Address')
                                ->options(fn(Get $get) => Address::where('contact_id', $get('customer_id'))->pluck('label', 'id'))
                                ->disabled(fn(Get $get): bool => !filled($get('customer_id')))
                                ->required()
                        ]),

                    Section::make('Payment Section')
                        ->schema([
                            Select::make('payment_method_id')
                                ->label('Payment Method')
                                ->options(PaymentMethod::where('is_active', true)->pluck('name', 'id'))
                                ->searchable()
                                ->live()
                                ->required(),

                            TextInput::make('payment_method_reference')
                                ->label('Method Reference'),
                        ]),
                ])->columnSpan(1)

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serials.serial')->searchable(),
                TextColumn::make('salesperson.name')->searchable(),
                TextColumn::make('customer_name')->searchable(),
                TextColumn::make('customer_phone')->searchable(),
                TextColumn::make('paymentMethod.name')->searchable(),
                TextColumn::make('sub_total'),
                TextColumn::make('grand_total'),
                TextColumn::make('status.name')->searchable(),
            ])
            ->filters([
                SelectFilter::make('salesperson')
                    ->relationship('salesperson', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                // DeleteAction::make(),
            ])
            ->bulkActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FlatOrderItemsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSalesFlatOrder::route('/'),
            'create' => CreateSalesFlatOrder::route('/create'),
            'edit' => EditSalesFlatOrder::route('/{record}/edit'),
            'view' => ViewSalesFlatOrder::route('/{record}/view'),
        ];
    }
}
