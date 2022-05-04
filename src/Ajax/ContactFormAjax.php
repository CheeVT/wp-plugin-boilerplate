<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Abstracts\Ajax;
use CheeVT\Ajax\Requests\ContactFormRequest;

class ContactFormAjax extends Ajax
{
    protected $action = 'contact_form';

    public function __construct()
    {
        parent::__construct();
        $this->request = new ContactFormRequest();
    }

    public function defineAjax()
    {
        $request = $this->request->validate();
        
        if(! $request->isValid()) {
            http_response_code(400);
            header('Content-type: application/json');
            print json_encode([
                'message' => 'Validation error',
                'errors' => $request->getMessages()
            ]);
            exit;
        }
        //$request = new ExampleFormRequest();
        //print_r($this->request->getAll());
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Thank you '. $this->request->data['name'] .'! You have contacted us successfully. We will reply you ASAP :-)',
        ]);

        exit;
    }
}