<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource\CreateAccountEntry;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource\ListAccountEntry;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\CreateAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\EditAccount;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountResource\ListAccount;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Addons\Accounting\Models\AccountEntry;
use Obelaw\ERP\Addons\Accounting\Models\AccountEntryAmount;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;

class AccountEntryResource extends Resource
{
    protected static ?string $model = AccountEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Accounting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Textarea::make('description'),

                    TextInput::make('added_on')
                        ->required()
                        ->type('date'),
                ]),

                Repeater::make('items')
                    ->relationship()
                    ->schema([
                        Select::make('type')
                            ->options([
                                'debit' => 'Debit',
                                'credit' => 'Credit',
                            ])
                            ->required()
                            ->columnSpan(1),

                        Select::make('account_id')
                            ->label('account')
                            ->searchable()
                            ->options(Account::get()->groupBy('type.name')->map(fn ($account) => $account->pluck('name', 'id')))
                            ->columnSpan(4),

                        TextInput::make('amount')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan(1),
                    ])
                    ->columns(6)

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable(),

                TextColumn::make('description')
                    ->searchable(),

                TextColumn::make('amount.debits.amount')
                    ->badge()
                    ->money('EGP')
                    ->color(function (string $state): string {
                        return 'gray';
                    }),

                TextColumn::make('amount.credits.amount')
                    ->badge()
                    ->money('EGP')
                    ->color(function (string $state): string {
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
            'index' => ListAccountEntry::route('/'),
            'create' => CreateAccountEntry::route('/create'),
            // 'edit' => EditAccount::route('/{record}/edit'),
        ];
    }
}
