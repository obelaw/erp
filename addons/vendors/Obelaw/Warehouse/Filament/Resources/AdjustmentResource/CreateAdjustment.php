<?php

namespace Obelaw\Warehouse\Filament\Resources\AdjustmentResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Warehouse\Facades\Adjustments;
use Obelaw\Warehouse\Filament\Resources\AdjustmentResource;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;

class CreateAdjustment extends CreateRecord
{
    protected static string $resource = AdjustmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Adjustments::new(new InitAdjustmentDTO(
            place_id: $data['place_id'],
            product_id: $data['product_id'],
            quantity: $data['quantity'],
            description: $data['description'],
        ));

        return $data;
    }
}
