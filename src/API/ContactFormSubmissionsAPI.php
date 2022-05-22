<?php

namespace CheeVT\API;

use CheeVT\Core\Abstracts\API;
use CheeVT\Repositories\ContactFormSubmissionRepository;

class ContactFormSubmissionsAPI extends API
{
    protected $namespace = 'cheevt';
    protected $route = 'contact-submissions';
    protected $method = 'GET';

    public function handle($params)
    {
        $page = $params->get_param('page') ?? 1;
        $perPage = $params->get_param('per_page') ?? 5;

        $repository = new ContactFormSubmissionRepository();
        $submissions = $repository->getListTableItems($perPage, $page);

        return $submissions;
    }
}