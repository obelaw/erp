<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource;
use Obelaw\Warehouse\Facades\Adjustments;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;

class CreateAdjustment extends CreateRecord
{
    protected static string $resource = AdjustmentResource::class;

    public function afterCreate()
    {
        foreach (range(1, $this->getRecord()->quantity) as $index) {
            $this->getRecord()->inventoryItem()->create([
                'place_id' => $this->getRecord()->place_id,
                'product_id' => $this->getRecord()->product_id,
            ]);
        }
    }
}
