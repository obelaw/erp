<?php

namespace Obelaw\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;

class Variant extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialSection = 'catal';
    protected static $serialHit = 'var';

    protected $table = 'catalog_variants';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_type',
        'unit_measure',
        'name',
        'description',
        'cost',
    ];
}
