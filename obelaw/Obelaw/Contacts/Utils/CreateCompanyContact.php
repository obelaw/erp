<?php

declare(strict_types=1);

namespace Obelaw\Contacts\Utils;

use Obelaw\Contacts\Abstracts\CreateContact;

class CreateCompanyContact extends CreateContact
{
    public $data;

    /**
     * @param string $jobPosition
     * @param string $name
     * @param string $mobile
     * @param string $email
     * @param string $website
     */
    public function __construct(string $name, string $mobile, string $email, string $website = null)
    {
        $this->data = new \stdClass();
        $this->data->type = 2;
        $this->data->name = $name;
        $this->data->mobile = $mobile;
        $this->data->email = $email;
        $this->data->website = $website;
    }
}
