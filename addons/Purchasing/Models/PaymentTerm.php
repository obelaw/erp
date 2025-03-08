<?php

namespace Obelaw\ERP\Addons\Purchasing\Models;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Obelaw\ERP\Addons\Purchasing\Models\PurchaseOrder;
use Obelaw\Twist\Base\BaseModel;

class PaymentTerm extends BaseModel
{
    protected $table = 'purchasing_payment_terms';

    protected $fillable = [
        'name',
        'description',
        'due_days',
        'discount_percentage',
        'discount_due_days',
        'is_active',
    ];

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
