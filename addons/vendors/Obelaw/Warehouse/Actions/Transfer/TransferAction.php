<?php

namespace Obelaw\Warehouse\Actions\Transfer;

use Obelaw\ERP\Base\BaseAction;
use Obelaw\Warehouse\Lib\Services\TransferService;

class TransferAction extends BaseAction
{
    public function handle($data)
    {
        return TransferService::make()->transfer($data);
    }
}
