<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Abstracts\Ajax;
use CheeVT\Ajax\Requests\ExampleFormRequest;

class ContactFormAjax extends Ajax
{
    protected $action = 'contact_form';

    public function __construct()
    {
        parent::__construct();
        $this->request = new ExampleFormRequest();
    }

    public function defineAjax()
    {
        //$request = new ExampleFormRequest();
        //print_r($this->request->getAll());
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Thank you '. $this->request->data['name'] .'! You have contacted us successfully. We will reply you ASAP :-)',
        ]);

        exit;
    }
}