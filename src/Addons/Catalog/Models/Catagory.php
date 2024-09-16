<?php

namespace Obelaw\ERP\Addons\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Twist\Base\BaseModel;

class Catagory extends BaseModel
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
