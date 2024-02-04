<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\Contacts\Models\Contact;

class Vendor extends Contact
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('documentType', function (Builder $builder) {
            $builder->where('document_type', ContactType::vendor);
        });
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'vendor_id', 'id');
    }
}
