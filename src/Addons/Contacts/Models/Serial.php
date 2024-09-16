<?php

namespace Obelaw\ERP\Addons\Audit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class Serial extends ModelBase
{
    use HasFactory;

    protected $table = 'serialization_serials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year',
        'sequence',
        'serial',
        'ulid',
        'barcode',
    ];

    /**
     * Get all of the models that own serials.
     */
    public function recordable()
    {
        return $this->morphTo();
    }
}
