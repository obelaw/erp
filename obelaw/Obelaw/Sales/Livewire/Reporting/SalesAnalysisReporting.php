<?php

namespace Obelaw\Sales\Livewire\Reporting;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Obelaw\Sales\Livewire\Reporting\InvoicesExport;
use Obelaw\Sales\Models\SalesOrder;
use Obelaw\Sales\Models\SalesOrderItem;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_reporting_coa')]
class SalesAnalysisReporting extends Component
{
    use BootPermission;

    public $report = 'sales';
    public $duration = 'current_month';
    public $date_from = null;
    public $date_to = null;

    public $collection = null;

    public function mount()
    {
        $this->setDuration($this->duration);

        $this->getProducts();
    }

    public function render()
    {
        return view('obelaw-sales::reporting.sales_analysis')->layout(DashboardLayout::class);
    }

    public function getTotals(): void
    {
        $totals = SalesOrder::query();

        $totals->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count'),
            DB::raw('CONCAT(sum(grand_total), " EGP") as total')
        )->groupBy('date');

        if ($this->date_from && $this->date_to) {
            $totals->whereBetween('created_at', [$this->date_from, $this->date_to]);
        }

        $totals = $totals->get()->toArray();

        $this->dispatch(
            'event-chart',
            series: [
                [
                    'name' => "Count Of Orders",
                    'data' => array_column($totals, 'count'),
                ],
                [
                    'name' => "Total",
                    'data' => array_column($totals, 'total'),
                ]
            ],
            series_color: ['#4299e1', '#f76707'],
            labels: array_column($totals, 'date'),
        );
    }

    public function getProducts(): void
    {
        $totals = SalesOrderItem::query();

        $totals->select(
            DB::raw('item_name as product'),
            DB::raw('COUNT(*) as count'),
            DB::raw('CONCAT(sum(item_price), " EGP") as total')
        )->groupBy('product');

        if ($this->date_from && $this->date_to) {
            $totals->whereBetween('created_at', [$this->date_from, $this->date_to]);
        }

        $this->collection = $totals = $totals->get()->toArray();

        $this->dispatch(
            'event-chart',
            series: [
                [
                    'name' => "Count Of Orders",
                    'data' => array_column($totals, 'count'),
                ],
                [
                    'name' => "Total",
                    'data' => array_column($totals, 'total'),
                ]
            ],
            series_color: ['#4299e1', '#f76707'],
            labels: array_column($totals, 'product'),
        );
    }

    public function submitFilter()
    {
        $this->setDuration($this->duration);

        if ($this->report == 'sales')
            $this->getTotals();

        if ($this->report == 'product')
            $this->getProducts();
    }

    public function exportFilter()
    {
        // dd($this->collection);

        // dd($this->date_from, $this->date_to);

        if ($this->report == 'product')
            return (new ProductsExport($this->date_from, $this->date_to))
                ->download($this->date_from . ' - ' . $this->date_to);
    }

    public function setDuration($duration)
    {
        $now = Carbon::now();

        if ($duration == 'today') {
            $this->date_from = Carbon::now()->startOfDay();
            $this->date_to = Carbon::now()->endOfDay();
        }

        if ($duration == 'current_month') {
            $this->date_from = $now->startOfMonth();
            $this->date_to = $now->today();
        }

        if ($duration == 'last_month') {
            $this->date_from = Carbon::now()->startOfMonth()->subMonth();
            $this->date_to = Carbon::now()->subMonth()->endOfMonth();
        }

        if ($duration == 'current_year') {
            $this->date_from = $now->startOfYear();
            $this->date_to = $now->today();
        }

        if ($duration == 'last_year') {
            $this->date_from = Carbon::now()->startOfYear()->subYear();
            $this->date_to = Carbon::now()->endOfYear()->subYear();
        }

        if ($duration == 'max') {
            $this->date_from = null;
            $this->date_to = null;
        }
    }
}
