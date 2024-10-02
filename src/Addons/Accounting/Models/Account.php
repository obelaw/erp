<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;
use Obelaw\ERP\Addons\Accounting\Models\JournalEntry;
use Obelaw\Twist\Base\BaseModel;

class Account extends BaseModel
{
    use HasFactory;

    protected $table = 'accounting_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_id',
        'name',
        'code',
        'opening_balance',
    ];

    /**
     * Scope a query to only include popular users.
     */
    public function scopeIsType(Builder $query, $name): void
    {
        $type = AccountType::whereName($name)->first();

        if ($type)
            $query->where('type_id', $type->id);
    }

    public function type()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function entries()
    {
        return $this->hasMany(JournalEntry::class, 'account_id', 'id');
    }
}
