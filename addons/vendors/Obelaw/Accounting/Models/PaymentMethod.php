<?php

namespace Obelaw\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class PaymentMethod extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'journal_id',
        'name',
        'is_active',
    ];

    public function getJournalTagAttribute()
    {
        return $this->journal->name . ' - #' . $this->journal->code;
    }

    public function getActiveAttribute()
    {
        return ($this->is_active) ? 'YES' : 'NO';
    }

    public function journal()
    {
        return $this->hasOne(Account::class, 'id', 'journal_id');
    }
}
