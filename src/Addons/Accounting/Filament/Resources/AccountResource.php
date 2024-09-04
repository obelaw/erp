<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\CreateAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\EditAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\ListAccount;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Accounting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('type_id')
                        ->label('Type')
                        ->required()
                        ->searchable()
                        ->options(AccountType::whereNotNull('parent_type')->get()->groupBy('parent.name')->map(fn($type) => $type->pluck('name', 'id'))),

                    TextInput::make('name')->required(),

                    TextInput::make('code')->required(),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup(Group::make('type.name'))
            ->columns([
                TextColumn::make('code')
                    ->searchable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('amount')
                    ->badge()
                    ->money('EGP')
                    ->color(function (string $state): string {
                        if ($state > 0)
                            return 'success';

                        if ($state < 0)
                            return 'danger';

                        return 'gray';
                    }),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAccount::route('/'),
            'create' => CreateAccount::route('/create'),
            'edit' => EditAccount::route('/{record}/edit'),
        ];
    }
}
