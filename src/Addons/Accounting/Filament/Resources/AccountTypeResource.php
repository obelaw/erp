<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Obelaw\ERP\Addons\Accounting\Filament\Clusters\Configuration;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountTypeResource\ListAccountType;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;

/**
 * Represents a Price List resource for Filament.
 *
 * This class defines the form, table, and other aspects of how Price Lists
 * are managed within the Filament admin panel.
 */
class AccountTypeResource extends Resource
{
    protected static ?string $cluster = Configuration::class;
    protected static ?string $model = AccountType::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereNotNull('parent_type');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('parent_type')
                    ->label('Type')
                    ->required()
                    ->searchable()
                    ->options(AccountType::whereNull('parent_type')->pluck('name', 'id')),

                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup(
                Group::make('parent.name')
            )
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => ListAccountType::route('/'),
        ];
    }
}
