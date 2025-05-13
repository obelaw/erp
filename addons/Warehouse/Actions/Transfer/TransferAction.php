<?php

namespace Obelaw\Warehouse\Actions\Transfer;

use Obelaw\Warehouse\Lib\Services\TransferService;
use Obelaw\Flow\Base\BaseAction;

class TransferAction extends BaseAction
{
    public function handle($data)
    {
        return TransferService::make()->transfer($data);
    }
}
