<?php

declare(strict_types=1);

namespace Obelaw\Contacts\Utils;

use Obelaw\Contacts\Abstracts\CreateContact;
use Obelaw\Contacts\Exceptions\JobPositionIsEmpty;

class CreateCustomerContact extends CreateContact
{
    public $data;

    /**
     * @param string $jobPosition
     * @param string $name
     * @param string $mobile
     * @param string $email
     * @param string $website
     */
    public function __construct(string $jobPosition = null, string $name, string $mobile, string $email, string $website = null)
    {
        if (!$jobPosition) {
            throw new JobPositionIsEmpty("Job Position Is Empty");
        }

        $this->data = new \stdClass();
        $this->data->type = 1;
        $this->data->job_position = $jobPosition;
        $this->data->name = $name;
        $this->data->mobile = $mobile;
        $this->data->email = $email;
        $this->data->website = $website;
    }
}
