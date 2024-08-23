<?php

namespace Obelaw\ERP\Addons\Accounting\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class AccountType extends ModelBase
{
    use HasFactory;

    protected $table = 'accounting_account_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_account',
        'name',
        'code',
        'type',
    ];
}
