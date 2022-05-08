<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Abstracts\Ajax;
use CheeVT\Ajax\Requests\ContactFormRequest;
use CheeVT\Repositories\ContactFormSubmissionRepository;

class ContactFormAjax extends Ajax
{
    protected $action = 'contact_form';

    public function __construct()
    {
        parent::__construct();
        $this->request = new ContactFormRequest;
        $this->repository = new ContactFormSubmissionRepository;
    }

    public function defineAjax()
    {
        $request = $this->request->validate();
        $validatedData = $request->getValues();

        if(! $request->isValid()) {
            wp_send_json_error([
                'message' => 'Validation error',
                'errors' => $request->getMessages()
            ], 400);
        }
        
        //print_r($this->request->getAll());

        $this->storeToDb($validatedData);
        $this->sendEmail($validatedData);

        wp_send_json_success([
            'message' => 'Thank you '. $this->request->data['name'] .'! You have contacted us successfully. We will reply you ASAP :-)',
        ], 200);
    }

    protected function sendEmail($validatedData)
    {
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Me Myself <me@example.net>';

        wp_mail('admin@gmail.com', $validatedData['subject'], $validatedData['message'], $headers);
    }

    protected function storeToDb($validatedData) {
        $this->repository->store($validatedData);
    }
}