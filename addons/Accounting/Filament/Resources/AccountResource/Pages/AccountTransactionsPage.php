<?php

namespace Obelaw\Accounting\Filament\Resources\AccountResource\Pages;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\Column;
use Illuminate\Support\Carbon;
use Obelaw\Accounting\Filament\Resources\AccountResource;
use Obelaw\Accounting\Lib\Services\Report\AccountTransactionReportService;

// #[PagePermission(
//     id: 'permit.rules.viewAnyxx',
//     title: 'Rules',
//     description: 'This rules',
//     category: 'Warehouse'
// )]
class AccountTransactionsPage extends Page
{
    // use HasFiltersForm;
    use InteractsWithRecord;

    public ?string $start_of_period = null;
    public ?string $start_of_period_selected = null;
    public ?string $end_of_period = null;
    public ?string $end_of_period_selected = null;

    protected static ?string $title = 'Account Transactions (GL)';

    protected static string $view = 'obelaw.flow::accounting.account-transactions';

    protected static string $resource = AccountResource::class;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTitle(): string
    {
        return 'Account Transactions (GL) ' . $this->record->name;
    }

    protected function getViewData(): array
    {
        $accountTransactionReportService = AccountTransactionReportService::make()
            ->setAccount(
                $this->record,
                $this->start_of_period_selected ?? now()->startOfMonth(),
                $this->end_of_period_selected ?? now()->endOfMonth()
            );

        return [
            'transactions' => $accountTransactionReportService->getTransactions(),
            'currentBalance' => $accountTransactionReportService->getCurrentBalance(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(4)
            ->live()
            ->schema([
                DatePicker::make('start_of_period'),
                DatePicker::make('end_of_period'),

                Actions::make([
                    Actions\Action::make('loadReportData')
                        ->label('Update Report')
                        ->submit('loadReportData')
                ])->verticallyAlignEnd(),
            ]);
    }

    public function getTable(): array
    {
        return [
            Column::make('date')
                ->label('Date')
                ->alignment(Alignment::Left),
            Column::make('description')
                ->label('Description')
                ->alignment(Alignment::Left),
            Column::make('debit')
                ->label('Debit')
                ->alignment(Alignment::Right),
            Column::make('credit')
                ->label('Credit')
                ->alignment(Alignment::Right),
            Column::make('balance')
                ->label('Balance')
                ->alignment(Alignment::Right),
        ];
    }

    public function loadReportData()
    {
        $this->start_of_period_selected = Carbon::parse($this->start_of_period)->startOfDay();
        $this->end_of_period_selected = Carbon::parse($this->end_of_period)->endOfDay();
    }
}
