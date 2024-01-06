<?php

namespace Obelaw\CRM\Exceptions;

class CustomerHasNewLeadException extends \Exception
{
    private $lead;

    public function setLead($lead)
    {
        $this->lead = $lead;
    }

    public function getLead()
    {
        return $this->lead;
    }
}
