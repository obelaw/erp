<?php

namespace Obelaw\Accounting\Filament\Resources\TransactionResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JournalsRelation extends RelationManager
{
    protected static ?string $title = 'Items';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'journals';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account.name')
                    ->searchable(),

                TextColumn::make('amount_debit')
                    ->label('Debit')
                    ->money('EGP')
                    ->alignCenter(),

                TextColumn::make('amount_credit')
                    ->label('Credit')
                    ->money('EGP')
                    ->alignCenter(),
            ]);
    }
}
