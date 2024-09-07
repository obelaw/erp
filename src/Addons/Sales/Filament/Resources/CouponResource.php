<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources;

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
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource\CreateCoupon;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource\EditCoupon;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource\ListCoupon;

use Obelaw\Sales\Models\Coupon;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Sales';

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
                                DatePicker::make('ends_at'),
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
