<?php

namespace Obelaw\CRM\Services;

use Obelaw\CRM\Exceptions\CustomerHasNewLeadException;
use Obelaw\CRM\Repositories\LeadRepository;
use Obelaw\Framework\Base\ServiceBase;

class LeadService extends ServiceBase
{
    public function __construct(
        public LeadRepository $leadRepository,
    ) {
    }

    public function create($assignedId, $contactId)
    {
        if ($lead = $this->leadRepository->getNewLead($contactId)) {
            $ex = new CustomerHasNewLeadException('This customer has a new lead');
            $ex->setLead($lead);
            throw $ex;
        }

        return $this->leadRepository->create($assignedId, $contactId);
    }

    public function getNewList()
    {
        return $this->leadRepository->getListLead('new');
    }
}
