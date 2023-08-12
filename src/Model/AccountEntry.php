<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class AccountEntry extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'added_on',
    ];

    public function amount()
    {
        return $this->hasOne(AccountEntryAmount::class, 'entry_id', 'id');
    }

    public function amounts()
    {
        return $this->hasMany(AccountEntryAmount::class, 'entry_id', 'id');
    }
}
