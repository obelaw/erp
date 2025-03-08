<?php

namespace Obelaw\ERP\Addons\Warehouse\Actions\Transfer;

use Obelaw\ERP\Addons\Warehouse\Lib\Services\TransferService;
use Obelaw\ERP\Base\BaseAction;

class TransferAction extends BaseAction
{
    public function handle($data)
    {
        return TransferService::make()->transfer($data);
    }
}
