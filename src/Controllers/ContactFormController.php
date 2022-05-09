<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;
use CheeVT\Core\Request;
use CheeVT\ListTables\ContacFormtSubmissionsListTable;
use CheeVT\Repositories\ContactFormSubmissionRepository;

class ContactFormController extends Controller
{
    public function __construct($__dir__)
    {
        parent::__construct($__dir__);
        $this->repository = new ContactFormSubmissionRepository;
        $this->request = new Request;
    }   

    public function index()
    {
        $table = new ContacFormtSubmissionsListTable($this->repository);
        if($this->request->s && $this->getAction() == 'search') {
            $table->setSearchItems($this->request->s);
        } else {
            $table->setItems();
        }
        
        $this->renderView('contact_form/index', compact('table'));
    }

    public function show($submissionId)
    {
        $submission = $this->repository->find($submissionId);

        if(! $submission) return;
        
        $this->renderView('contact_form/show', compact('submission'));
    }

    
}