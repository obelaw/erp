<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Filament\Clusters\AccountingCluster;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PriceListResource\CreatePricelist;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PriceListResource\EditPricelist;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PriceListResource\ListPricelist;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\PriceListResource\RelationManagers\PriceListItemsRelation;
use Obelaw\ERP\Addons\Accounting\Models\Pricelist;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.accounting.pricelist.viewAny',
    title: 'Pricelist',
    description: 'Access on payment methods at accounting',
    permissions: [
        'permit.accounting.pricelist.create' => 'Can Create',
        'permit.accounting.pricelist.edit' => 'Can Edit',
        'permit.accounting.pricelist.delete' => 'Can Delete',
    ]
)]
/**
 * Represents a Price List resource for Filament.
 *
 * This class defines the form, table, and other aspects of how Price Lists
 * are managed within the Filament admin panel.
 */
class PriceListResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.accounting.pricelist.viewAny',
        'can_create' => 'permit.accounting.pricelist.create',
        'can_edit' => 'permit.accounting.pricelist.edit',
        'can_delete' => 'permit.accounting.pricelist.delete',
    ];

    protected static ?string $model = Pricelist::class;
    protected static ?string $cluster = AccountingCluster::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')->required(),

                    DatePicker::make('start_date'),

                    DatePicker::make('end_date'),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('start_date')
                    ->searchable(),

                TextColumn::make('end_date')
                    ->searchable(),

                TextColumn::make('items_count')
                    ->badge()
                    ->color('gray')
                    ->alignCenter()
                    ->counts('items'),
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
            PriceListItemsRelation::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPricelist::route('/'),
            'create' => CreatePricelist::route('/create'),
            'edit' => EditPricelist::route('/{record}/edit'),
        ];
    }
}
