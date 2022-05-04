<?php

namespace CheeVT\Ajax\Requests;

use CheeVT\Core\Request;

class ContactFormRequest extends Request
{
    protected $methods = ['POST'];
    
    protected function rules()
    {
        $this->validator->required('name')->string();
        $this->validator->required('email')->email();
        $this->validator->required('subject')->string();
        $this->validator->required('message')->string();
    }
}