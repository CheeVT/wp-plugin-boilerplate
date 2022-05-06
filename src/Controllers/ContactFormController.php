<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;
use CheeVT\ListTables\ContacFormtSubmissionsListTable;
use CheeVT\Repositories\ContactFormSubmissionRepository;

class ContactFormController extends Controller
{
    public function __construct($__dir__)
    {
        parent::__construct($__dir__);
        $this->repository = new ContactFormSubmissionRepository;
    }   

    public function index()
    {
        $table = new ContacFormtSubmissionsListTable($this->repository);
        
        $this->renderView('index', compact('table'));
    }

    public function show($submissionId)
    {
        $submission = $this->repository->find($submissionId);

        if(! $submission) return;
        
        $this->renderView('show', compact('submission'));
    }

    
}