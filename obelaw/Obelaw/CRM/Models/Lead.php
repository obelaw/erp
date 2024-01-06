<?php

namespace Obelaw\CRM\Models;

use Obelaw\Contacts\Models\Contact;
use Obelaw\Framework\Base\ModelBase;

class Lead extends ModelBase
{
    protected $table = 'crm_leads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'creator_id',
        'assigned_id',
        'contact_id',
        'status',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
