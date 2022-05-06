<?php

namespace CheeVT\AdminPages;

use CheeVT\Core\Abstracts\AdminPage;
use CheeVT\Controllers\ContactFormController;

class ContactFormAdminPage extends AdminPage
{
    protected $pageTitle = 'Contact form submissions';
    protected $menuTitle = 'Submissions';
    protected $capability = 'read';
    protected $menuSlug = 'contact_form_submissions';
    protected $position = 99;
    protected $controller;

    public function __construct($__dir__)
    {
        parent::__construct();
        $this->controller = new ContactFormController($__dir__);
    }

    public function handleView()
    {
        if($this->controller->getAction() == 'show') {
            return $this->controller->show($this->controller->getId());
        }
        return $this->controller->index();
    }
}