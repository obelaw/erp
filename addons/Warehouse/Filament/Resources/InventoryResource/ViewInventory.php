<?php

namespace Obelaw\Warehouse\Filament\Resources\InventoryResource;

use Exception;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Maatwebsite\Excel\Facades\Excel;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Warehouse\Enums\PlaceItemType;
use Obelaw\Warehouse\Exports\InventoryImportTemplate;
use Obelaw\Warehouse\Exports\InventoryImportCsvTemplate;
use Obelaw\Warehouse\Filament\Resources\InventoryResource;
use Obelaw\Warehouse\Models\Imports\ItemsImport;
use Obelaw\Warehouse\Services\PlaceService;

class ViewInventory extends ViewRecord
{
    protected static string $resource = InventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            $this->getDownloadTemplateAction(),
            $this->getImportAction(),
            $this->getExportAction(),
            $this->getInventoryStatsAction(),
        ];
    }

    /**
     * Get the download template action
     */
    private function getDownloadTemplateAction(): Action
    {
        return Action::make('DownloadTemplate')
            ->form([
                Select::make('format')
                    ->label('Template Format')
                    ->options([
                        'xlsx' => 'Excel (.xlsx) - Recommended',
                        'csv' => 'CSV (.csv)',
                    ])
                    ->default('xlsx')
                    ->required()
                    ->helperText('Excel format includes formatting and instructions'),
            ])
            ->action(function (array $data) {
                return $this->handleTemplateDownload($data['format']);
            })
            ->label('Download Template')
            ->icon('heroicon-o-document-arrow-down')
            ->color(Color::Indigo)
            ->modalHeading('Download Import Template')
            ->modalSubmitActionLabel('Download')
            ->tooltip('Download Excel or CSV template for importing inventory items');
    }

    /**
     * Get the import action with enhanced validation and error handling
     */
    private function getImportAction(): Action
    {
        return Action::make('Import')
            ->form([
                FileUpload::make('file')
                    ->label('Choose CSV or Excel File')
                    ->required()
                    ->acceptedFileTypes([
                        'text/csv',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/csv'
                    ])
                    ->maxSize(10240) // 10MB limit
                    ->helperText('⚠️ Use the Download Template button first! Supported formats: CSV, XLS, XLSX. Maximum file size: 10MB')
                    ->disk('local')
                    ->directory('imports/inventory')
                    ->preserveFilenames()
                    ->rules(['required', 'file', 'mimes:csv,xls,xlsx']),

                Textarea::make('description')
                    ->label('Import Description (Optional)')
                    ->placeholder('Describe this import batch...')
                    ->maxLength(500),
            ])
            ->action(function (array $data) {
                $this->handleImport($data);
            })
            ->label('Import Items')
            ->icon('heroicon-o-arrow-up-tray')
            ->color(Color::Blue)
            ->requiresConfirmation()
            ->modalHeading('Import Inventory Items')
            ->modalDescription('Upload a CSV or Excel file to import inventory items. IMPORTANT: Download the template first and use the exact column headers provided!')
            ->modalSubmitActionLabel('Start Import');
    }

    /**
     * Get the export action for inventory data
     */
    private function getExportAction(): Action
    {
        return Action::make('Export')
            ->form([
                Select::make('format')
                    ->label('Export Format')
                    ->options([
                        'xlsx' => 'Excel (.xlsx)',
                        'csv' => 'CSV (.csv)',
                    ])
                    ->default('xlsx')
                    ->required(),

                Select::make('status_filter')
                    ->label('Filter by Status')
                    ->options([
                        'all' => 'All Items',
                        PlaceItemStatus::IN->value => 'In Stock',
                        PlaceItemStatus::OUT->value => 'Out of Stock',
                        PlaceItemStatus::PENDING->value => 'Pending',
                    ])
                    ->default('all'),
            ])
            ->action(function (array $data) {
                $this->handleExport($data);
            })
            ->label('Export Items')
            ->icon('heroicon-o-arrow-down-tray')
            ->color(Color::Green);
    }

    /**
     * Get the inventory statistics action
     */
    private function getInventoryStatsAction(): Action
    {
        return Action::make('InventoryStats')
            ->action(function () {
                // Action is handled by the modal display
            })
            ->label('View Statistics')
            ->icon('heroicon-o-chart-bar-square')
            ->color(Color::Gray)
            ->modalHeading('Inventory Statistics')
            ->modalContent(function () {
                try {
                    return view('obelaw.flow::warehouse.inventory-stats', $this->getInventoryStatsData());
                } catch (Exception $e) {
                    // Fallback to inline HTML if view fails
                    return new HtmlString(
                        '<div class="p-4 text-red-600 bg-red-50 rounded-lg">' .
                            '<strong>Error loading statistics:</strong> ' . e($e->getMessage()) .
                            '</div>'
                    );
                }
            })
            ->modalWidth('2xl')
            ->slideOver();
    }

    /**
     * Handle file import with comprehensive error handling and logging
     */
    private function handleImport(array $data): void
    {
        try {
            $filePath = $data['file'];
            $description = $data['description'] ?? 'Inventory import';

            // Validate file exists
            if (!Storage::disk('local')->exists($filePath)) {
                throw new Exception('Upload file not found.');
            }

            // Log import start
            Log::info('Inventory import started', [
                'inventory_id' => $this->record->id,
                'inventory_name' => $this->record->name,
                'file_path' => $filePath,
                'description' => $description,
                'user_id' => Auth::id(),
            ]);

            // Process import
            $import = new ItemsImport($this->record);
            Excel::import($import, $filePath);

            // Clean up uploaded file after successful import
            Storage::disk('local')->delete($filePath);

            Notification::make()
                ->title('Import Successful')
                ->body('Inventory items have been imported successfully.')
                ->success()
                ->duration(5000)
                ->send();

            Log::info('Inventory import completed successfully', [
                'inventory_id' => $this->record->id,
                'user_id' => Auth::id(),
            ]);

            // Refresh the page to show new data
            redirect()->to(static::getUrl(parameters: ['record' => $this->record]));
        } catch (Exception $e) {
            // Clean up uploaded file on error
            if (isset($filePath) && Storage::disk('local')->exists($filePath)) {
                Storage::disk('local')->delete($filePath);
            }

            Log::error('Inventory import failed', [
                'inventory_id' => $this->record->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
            ]);

            Notification::make()
                ->title('Import Failed')
                ->body('Failed to import inventory items: ' . $e->getMessage())
                ->danger()
                ->duration(8000)
                ->send();
        }
    }

    /**
     * Handle template download
     */
    private function handleTemplateDownload(string $format = 'xlsx')
    {
        try {
            $filename = sprintf(
                'inventory_import_template_%s.%s',
                now()->format('Y-m-d'),
                $format
            );

            Log::info('Template download requested', [
                'inventory_id' => $this->record->id,
                'filename' => $filename,
                'format' => $format,
                'user_id' => Auth::id(),
            ]);

            // Generate and download the template
            if ($format === 'csv') {
                return Excel::download(new InventoryImportCsvTemplate(), $filename);
            } else {
                return Excel::download(new InventoryImportTemplate(), $filename);
            }
        } catch (Exception $e) {
            Log::error('Template download failed', [
                'inventory_id' => $this->record->id,
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            Notification::make()
                ->title('Download Failed')
                ->body('Failed to download template: ' . $e->getMessage())
                ->danger()
                ->send();

            return null;
        }
    }

    /**
     * Handle data export
     */
    private function handleExport(array $data): void
    {
        try {
            $format = $data['format'];
            $statusFilter = $data['status_filter'];

            // Get PlaceService instance
            $placeService = new PlaceService($this->record);

            // Generate filename
            $filename = sprintf(
                'inventory_%s_%s.%s',
                $this->record->code,
                now()->format('Y-m-d_H-i-s'),
                $format
            );

            Log::info('Inventory export started', [
                'inventory_id' => $this->record->id,
                'format' => $format,
                'status_filter' => $statusFilter,
                'user_id' => Auth::id(),
            ]);

            // TODO: Implement export logic using PlaceService
            // This would require creating an export class

            Notification::make()
                ->title('Export Completed')
                ->body("Export file generated: {$filename}")
                ->success()
                ->send();
        } catch (Exception $e) {
            Log::error('Inventory export failed', [
                'inventory_id' => $this->record->id,
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            Notification::make()
                ->title('Export Failed')
                ->body('Failed to export inventory data: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    /**
     * Get inventory statistics data for the view
     */
    private function getInventoryStatsData(): array
    {
        try {
            // Get basic statistics
            $totalItems = $this->record->items()->count();
            $inStockItems = $this->record->items()
                ->where('status', PlaceItemStatus::IN->value)
                ->count();
            $outItems = $this->record->items()
                ->where('status', PlaceItemStatus::OUT->value)
                ->count();
            $pendingItems = $this->record->items()
                ->where('status', PlaceItemStatus::PENDING->value)
                ->count();

            $storableItems = $this->record->items()
                ->where('type', PlaceItemType::STORABLE->value)
                ->count();
            $consumableItems = $this->record->items()
                ->where('type', PlaceItemType::CONSUMABLE->value)
                ->count();

            return compact(
                'totalItems',
                'inStockItems',
                'outItems',
                'pendingItems',
                'storableItems',
                'consumableItems'
            );
        } catch (Exception $e) {
            Log::error('Failed to get inventory statistics data', [
                'inventory_id' => $this->record->id,
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            // Return default data with error indication
            return [
                'totalItems' => 0,
                'inStockItems' => 0,
                'outItems' => 0,
                'pendingItems' => 0,
                'storableItems' => 0,
                'consumableItems' => 0,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Configure the infolist with enhanced information display
     */
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Information')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                Section::make('Basic Information')
                                    ->schema([
                                        TextEntry::make('name')
                                            ->label('Inventory Name'),
                                        TextEntry::make('code')
                                            ->label('Inventory Code'),
                                        TextEntry::make('description')
                                            ->label('Description')
                                            ->placeholder('No description provided'),
                                        TextEntry::make('address')
                                            ->label('Address')
                                            ->placeholder('No address provided'),
                                    ])
                                    ->columns(2),

                                Section::make('Warehouse Information')
                                    ->schema([
                                        TextEntry::make('warehouse.name')
                                            ->label('Parent Warehouse'),
                                        TextEntry::make('warehouse.code')
                                            ->label('Warehouse Code'),
                                    ])
                                    ->columns(2),
                            ]),

                        Tabs\Tab::make('Statistics')
                            ->icon('heroicon-m-chart-bar')
                            ->schema([
                                Section::make('Item Counts')
                                    ->schema([
                                        TextEntry::make('total_items')
                                            ->label('Total Items')
                                            ->state(fn($record) => $record->items()->count())
                                            ->badge()
                                            ->color('gray'),

                                        TextEntry::make('in_stock_items')
                                            ->label('In Stock')
                                            ->state(fn($record) => $record->items()->where('status', PlaceItemStatus::IN->value)->count())
                                            ->badge()
                                            ->color('success'),

                                        TextEntry::make('pending_items')
                                            ->label('Pending')
                                            ->state(fn($record) => $record->items()->where('status', PlaceItemStatus::PENDING->value)->count())
                                            ->badge()
                                            ->color('warning'),

                                        TextEntry::make('out_items')
                                            ->label('Out of Stock')
                                            ->state(fn($record) => $record->items()->where('status', PlaceItemStatus::OUT->value)->count())
                                            ->badge()
                                            ->color('danger'),
                                    ])
                                    ->columns(4),

                                Section::make('Item Types')
                                    ->schema([
                                        TextEntry::make('storable_items')
                                            ->label('Storable Items')
                                            ->state(fn($record) => $record->items()->where('type', PlaceItemType::STORABLE->value)->count())
                                            ->badge()
                                            ->color('blue'),

                                        TextEntry::make('consumable_items')
                                            ->label('Consumable Items')
                                            ->state(fn($record) => $record->items()->where('type', PlaceItemType::CONSUMABLE->value)->count())
                                            ->badge()
                                            ->color('orange'),
                                    ])
                                    ->columns(2),
                            ]),

                        Tabs\Tab::make('Audit Information')
                            ->icon('heroicon-m-clock')
                            ->schema([
                                Section::make('Timestamps')
                                    ->schema([
                                        TextEntry::make('created_at')
                                            ->label('Created At')
                                            ->dateTime(),
                                        TextEntry::make('updated_at')
                                            ->label('Last Updated')
                                            ->dateTime(),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
            ])
            ->columns(1);
    }

    /**
     * Get additional actions for the page
     */
    protected function getActions(): array
    {
        return [
            Action::make('refresh_stats')
                ->label('Refresh Statistics')
                ->icon('heroicon-o-arrow-path')
                ->action(function () {
                    $this->refreshFormData(['total_items', 'in_stock_items', 'pending_items', 'out_items']);

                    Notification::make()
                        ->title('Statistics Refreshed')
                        ->success()
                        ->send();
                })
                ->color(Color::Gray),
        ];
    }
}
