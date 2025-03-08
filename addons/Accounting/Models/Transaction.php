<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Accounting\Models\JournalEntry;
use Obelaw\Twist\Base\BaseModel;

class Transaction extends BaseModel
{
    use HasFactory;

    protected $table = 'accounting_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'added_at',
    ];

    public function scopeIsPosted(Builder $query): void
    {
        $query->whereNotNull('posted_by')
            ->whereNotNull('posted_at');
    }

    public function getTotalAttribute()
    {
        $debit = $this->amount()->whereType('debit')->sum('amount');
        $credit = $this->amount()->whereType('credit')->sum('amount');

        return amount($credit) . ' / ' . amount($debit);
    }

    public function journals()
    {
        return $this->hasMany(JournalEntry::class, 'transaction_id', 'id');
    }

    public function amount()
    {
        return $this->hasOne(JournalEntry::class, 'transaction_id', 'id');
    }

    public function amounts()
    {
        return $this->hasMany(JournalEntry::class, 'transaction_id', 'id');
    }
}
