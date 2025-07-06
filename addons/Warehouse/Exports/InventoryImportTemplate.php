<?php

namespace Obelaw\Warehouse\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class InventoryImportTemplate implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithProperties, WithTitle
{
    /**
     * Return the template data with sample rows
     */
    public function array(): array
    {
        return [
            // Sample data rows
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
            // Add empty rows for user input
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
        ];
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

    /**
     * Apply styles to the worksheet
     */
    public function styles(Worksheet $sheet)
    {
        // Header row styling
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4F46E5'], // Indigo background
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Sample data rows styling
        $sheet->getStyle('A2:G4')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F3F4F6'], // Light gray background
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D1D5DB'],
                ],
            ],
        ]);

        // Empty rows for user input
        $sheet->getStyle('A5:G12')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'E5E7EB'],
                ],
            ],
        ]);

        // Add instructions in a separate area
        $sheet->setCellValue('I1', 'IMPORT INSTRUCTIONS');
        $sheet->setCellValue('I2', 'IMPORTANT: Do not modify column headers!');
        $sheet->setCellValue('I3', '1. sku: Required - Product SKU identifier');
        $sheet->setCellValue('I4', '2. product_name: Optional - Product display name');
        $sheet->setCellValue('I5', '3. serial_number: Optional - Item serial number');
        $sheet->setCellValue('I6', '4. type: storable or consumable (default: storable)');
        $sheet->setCellValue('I7', '5. status: in, out, or pending (default: in)');
        $sheet->setCellValue('I8', '6. quantity: Number of items to create (default: 1)');
        $sheet->setCellValue('I9', '7. description: Optional - Item description');
        $sheet->setCellValue('I10', '');
        $sheet->setCellValue('I11', 'SAMPLE DATA:');
        $sheet->setCellValue('I12', 'Rows 2-4 contain sample data for reference.');
        $sheet->setCellValue('I13', 'Delete sample rows before importing.');

        // Style instructions
        $sheet->getStyle('I1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => '1F2937']],
        ]);

        $sheet->getStyle('I2:I13')->applyFromArray([
            'font' => ['size' => 10, 'color' => ['rgb' => '374151']],
            'alignment' => ['wrapText' => true],
        ]);

        // Highlight the important warning
        $sheet->getStyle('I2')->applyFromArray([
            'font' => ['bold' => true, 'size' => 11, 'color' => ['rgb' => 'DC2626']], // Red color
        ]);

        return $sheet;
    }

    /**
     * Set column widths
     */
    public function columnWidths(): array
    {
        return [
            'A' => 15, // sku
            'B' => 25, // product_name
            'C' => 20, // serial_number
            'D' => 12, // type
            'E' => 10, // status
            'F' => 10, // quantity
            'G' => 30, // description
            'H' => 3,  // Spacer
            'I' => 40, // Instructions
        ];
    }

    /**
     * Set document properties
     */
    public function properties(): array
    {
        return [
            'creator' => 'Warehouse Management System',
            'lastModifiedBy' => 'System',
            'title' => 'Inventory Import Template',
            'description' => 'Template for importing inventory items into the warehouse system',
            'subject' => 'Inventory Import',
            'keywords' => 'inventory,import,template,warehouse',
            'category' => 'Template',
            'manager' => 'Warehouse System',
            'company' => 'Obelaw',
        ];
    }

    /**
     * Set worksheet title
     */
    public function title(): string
    {
        return 'Inventory Import';
    }
}
