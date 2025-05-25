<?php

namespace Obelaw\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Twist\Base\BaseModel;

class AccountType extends BaseModel
{
    use HasFactory;

    protected $table = 'accounting_account_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_type',
        'name',
        'nature',
    ];

    public function parent()
    {
        return $this->hasOne(AccountType::class, 'id', 'parent_type');
    }

    public function children()
    {
        return $this->hasMany(AccountType::class, 'parent_type', 'id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'type_id', 'id');
    }
}
