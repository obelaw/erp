<?php

use Obelaw\Accounting\Console\AddAcountsCommand;
use Obelaw\Framework\Schema\Install\Install;

return new class
{
    public function commands(Install $install)
    {
        $install->addCommand(AddAcountsCommand::class);
    }
};
