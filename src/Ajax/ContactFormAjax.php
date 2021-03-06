<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Mail;
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
        $options = get_option('contact_form_option_group');
        $request = $this->request->validate();
        $validatedData = $request->getValues();

        if(! $request->isValid()) {
            wp_send_json_error([
                'message' => __('Validation error', 'cheevt-plugin-boilerplate'),
                'errors' => $request->getMessages()
            ], 400);
        }
        
        //print_r($this->request->getAll());

        if(isset($options['store_to_db_enabled'])) {
            $this->storeToDb($validatedData);
        }

        if(isset($options['send_email_enabled']) &&
            isset($options['send_email_to'])) {
                $this->sendEmail($validatedData, $options['send_email_to']);
            }

        wp_send_json_success([
            'message' => sprintf(
                __('Thank you %s! You have contacted us successfully. We will reply you ASAP :-)', 'cheevt-plugin-boilerplate'), 
                $this->request->data['name']),
        ], 200);
    }

    protected function sendEmail($data, $to)
    {
        //Mail::send($to, $data['subject'], $data['message']);
        Mail::send($to, $data['subject'], $data, 'contact-form', $headers);
    }

    protected function storeToDb($data) {
        $this->repository->store($data);
    }
}