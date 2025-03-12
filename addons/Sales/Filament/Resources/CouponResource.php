<?php

namespace Obelaw\Sales\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Sales\Filament\Clusters\SalesCluster;
use Obelaw\Sales\Filament\Resources\CouponResource\CreateCoupon;
use Obelaw\Sales\Filament\Resources\CouponResource\EditCoupon;
use Obelaw\Sales\Filament\Resources\CouponResource\ListCoupon;
use Obelaw\Sales\Models\Coupon;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.sales.coupon.viewAny',
    title: 'Sales Coupon',
    description: 'Access on sales coupon at sales',
    permissions: [
        'permit.sales.coupon.create' => 'Can Create',
        'permit.sales.coupon.edit' => 'Can Edit',
        'permit.sales.coupon.delete' => 'Can Delete',
    ]
)]
class CouponResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.sales.coupon.viewAny',
        'can_create' => 'permit.sales.coupon.create',
        'can_edit' => 'permit.sales.coupon.edit',
        'can_delete' => 'permit.sales.coupon.delete',
    ];

    protected static ?string $model = Coupon::class;
    protected static ?string $cluster = SalesCluster::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Wizard::make([
                    Wizard\Step::make('Information')
                        ->schema([
                            TextInput::make('coupon_name'),
                            TextInput::make('coupon_code'),

                            Grid::make()->schema([
                                DatePicker::make('start_at'),
                                DatePicker::make('ends_at')->afterOrEqual('start_at'),
                            ])->columns(2),

                            Toggle::make('is_active')
                                ->label('Active'),
                        ]),
                    Wizard\Step::make('Discount')
                        ->schema([
                            Select::make('discount_type')
                                ->options([
                                    'percentage' => 'Percentage',
                                    'fixed' => 'Fixed',
                                ]),
                            TextInput::make('discount_value'),
                        ]),
                ]),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('coupon_name')->searchable(),
                TextColumn::make('coupon_code')->searchable(),

                ColumnGroup::make('discount', [
                    TextColumn::make('discount_type')->alignCenter(),
                    TextColumn::make('discount_value')->alignCenter(),
                ])->alignCenter(),

                ColumnGroup::make('duration', [
                    TextColumn::make('start_at')->alignCenter(),
                    TextColumn::make('ends_at')->alignCenter(),
                ])->alignCenter(),

                IconColumn::make('is_active')
                    ->alignCenter()
                    ->label('Active')
                    ->boolean(),
            ])
            ->filters([
                // TrashedFilter::make(),
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
            // FlatOrderItemsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoupon::route('/'),
            'create' => CreateCoupon::route('/create'),
            'edit' => EditCoupon::route('/{record}/edit'),
            // 'view' => ViewSalesFlatOrder::route('/{record}/view'),
        ];
    }
}
