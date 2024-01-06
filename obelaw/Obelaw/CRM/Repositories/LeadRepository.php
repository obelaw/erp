<?php

namespace Obelaw\CRM\Repositories;

use Obelaw\CRM\Models\Lead;

class LeadRepository
{
    public function create($assignedId, $contactId)
    {
        return Lead::create([
            'creator_id' => 1,
            'assigned_id' => $assignedId,
            'contact_id' => $contactId,
        ]);
    }

    public function hasNewLead($contactId)
    {
        return Lead::where('contact_id', $contactId)->where('status', 'new')->exists();
    }

    public function getNewLead($contactId)
    {
        return Lead::where('contact_id', $contactId)->where('status', 'new')->first();
    }

    public function getListLead($status)
    {
        return Lead::where('status', $status)->with(['contact'])->get();
    }
}
