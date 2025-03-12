<?php

namespace Obelaw\Warehouse\Filament\Resources\TransferResource;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Obelaw\Warehouse\Filament\Resources\TransferResource;
use Obelaw\Warehouse\Lib\Services\TransferService;

class EditTransfer extends EditRecord
{
    protected static string $resource = TransferResource::class;

    protected function beforeSave(): void
    {
        if (!TransferService::make()->canApprove($this->record)) {
            Notification::make()
                ->warning()
                ->title('You don\'t have an active subscription!')
                ->body('Choose a plan to continue.')
                ->persistent()
                ->send();

            $this->halt();
        }
    }
}
