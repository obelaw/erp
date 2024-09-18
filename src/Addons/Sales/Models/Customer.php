<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Contacts\Lib\Enums\ContactType;
use Obelaw\ERP\Addons\Contacts\Models\Contact;
use Obelaw\ERP\Addons\Sales\Models\CustomerJournal;

class Customer extends Contact
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('documentType', function (Builder $builder) {
            $builder->where('document_type', ContactType::customer);
        });
    }

    public function journal()
    {
        return $this->hasOne(CustomerJournal::class, 'customer_id', 'id');
    }
}
