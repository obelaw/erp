<?php

namespace Obelaw\Warehouse\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryImportCsvTemplate implements FromCollection, WithHeadings
{
    /**
     * Return the template data
     */
    public function collection()
    {
        return new Collection([
            [
                'SKU-001',
                'Laptop Computer',
                'SERIAL-12345',
                'storable',
                'in',
                1,
                'Sample laptop for demonstration'
            ],
            [
                'SKU-002',
                'Office Paper',
                '',
                'consumable',
                'in',
                100,
                'A4 office paper pack'
            ],
            [
                'SKU-003',
                'Mobile Phone',
                'PHONE-67890',
                'storable',
                'pending',
                1,
                'Sample mobile phone'
            ],
        ]);
    }

    /**
     * Return the column headings
     */
    public function headings(): array
    {
        return [
            'sku',
            'product_name',
            'serial_number',
            'type',
            'status',
            'quantity',
            'description'
        ];
    }
}
