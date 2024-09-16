<?php

namespace Obelaw\ERP;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Obelaw\ERP\Managers\TableManager;

class ERPManager
{
    public static function tableActions(): TableManager
    {
        return new TableManager([
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ]);
    }
}
