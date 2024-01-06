<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;

class Plan extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialPrefix = 'manuf';
    protected static $serialHit = 'pla';

    protected $table = 'manufacturing_plans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'start_at',
        'end_at',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, PlanOrder::class, 'plan_id', 'order_id');
    }
}
