<?php

namespace Obelaw\ERP\Base;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Traits\Macroable;

abstract class BaseAction
{
    use Macroable;

    public static function make($data): static
    {
        $static = app(static::class);

        DB::beginTransaction();

        try {
            $static->handle($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Notification::make()
                ->title($e->getMessage())
                ->warning()
                ->send();
        }

        return $static;
    }
}
