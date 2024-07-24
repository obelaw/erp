<?php

namespace Obelaw\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class Catagory extends ModelBase
{
    use HasFactory;

    protected $table = 'catalog_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
    ];

    public function parent()
    {
        return $this->belongsTo(Catagory::class, 'id', 'parent_id');
    }
}
