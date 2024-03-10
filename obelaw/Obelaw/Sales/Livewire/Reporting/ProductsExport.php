<?php

namespace Obelaw\Sales\Livewire\Reporting;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;
use Obelaw\Sales\Models\SalesOrderItem;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function __construct(
        public $date_from = null,
        public $date_to = null
    ) {
    }

    public function headings(): array
    {
        return [
            'Product',
            'Count',
            'Sum Total',
        ];
    }

    public function collection()
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

        return $totals->get();
    }
}
