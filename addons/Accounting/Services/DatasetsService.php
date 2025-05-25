<?php

namespace Obelaw\Accounting\Services;

use Obelaw\Accounting\Models\AccountType;
use Obelaw\Flow\Base\BaseService;

class DatasetsService extends BaseService
{
    public function importCOA($file)
    {
        $jsonContent = file_get_contents($file);
        $coas = json_decode($jsonContent, true);

        foreach ($coas as $coa) {
            $acc = AccountType::firstOrCreate([
                'name' => $coa['name'],
                'nature' => $coa['nature'],
            ]);

            foreach ($coa['children'] as $child) {
                $children = $acc->children()->firstOrCreate([
                    'name' => $child['name'],
                    'nature' => $child['nature'],
                ]);

                if (isset($child['accounts']))
                    foreach ($child['accounts'] as $account) {
                        $children->accounts()->firstOrCreate([
                            'code' => $account['code'],
                            'name' => $account['name'],
                        ]);
                    }
            }
        }
    }
}
