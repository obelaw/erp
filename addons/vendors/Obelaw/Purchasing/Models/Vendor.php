<?php

namespace Obelaw\Purchasing\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Accounting\Model\Payment;
use Obelaw\Accounting\Model\VendorJournal;
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

    public function journal()
    {
        return $this->hasOne(VendorJournal::class, 'vendor_id', 'id');
    }
}
