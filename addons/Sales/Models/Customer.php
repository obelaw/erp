<?php

namespace Obelaw\Sales\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Contacts\ContactType;
use Obelaw\Contacts\Models\Contact;
use Obelaw\Sales\Models\CustomerJournal;

class Customer extends Contact
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('documentType', function (Builder $builder) {
            $builder->where('document_type', ContactType::get('CUSTOMER'));
        });
    }

    public function journal()
    {
        return $this->hasOne(CustomerJournal::class, 'customer_id', 'id');
    }
}
