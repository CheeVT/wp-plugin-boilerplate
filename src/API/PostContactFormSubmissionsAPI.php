<?php

namespace CheeVT\API;

use CheeVT\Core\Abstracts\API;
use CheeVT\Ajax\Requests\ContactFormRequest;
use CheeVT\Repositories\ContactFormSubmissionRepository;

class PostContactFormSubmissionsAPI extends API
{
    protected $namespace = 'cheevt';
    protected $route = 'contact-submissions';
    protected $method = 'POST';
    
    /**
     * POST: wp-json/cheevt/contact-submissions/;
     * Body, data payload in JSON object
     */
    public function handle($params)
    {
        $request = new ContactFormRequest();
        $validation = $request->apiBody($params->get_body())->validateRestAPI();
        $validatedData = $validation->getValues();
        //print_r($validatedData);
        
        if(! $validation->isValid()) {
            wp_send_json_error([
                'message' => __('Validation error', 'cheevt-plugin-boilerplate'),
                'errors' => $validation->getMessages()
            ], 400);
        }

        $repository = new ContactFormSubmissionRepository();
        $repository->store($validatedData);

        wp_send_json_success([
            'message' => 'You have successfully inserted a new submission',
        ], 200);
    }
}