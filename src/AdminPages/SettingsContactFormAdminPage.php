<?php

namespace CheeVT\AdminPages;

use CheeVT\Core\Abstracts\AdminPage;
use CheeVT\Controllers\SettingsContactFormController;

class SettingsContactFormAdminPage extends AdminPage
{
    protected $parentSlug = 'contact_form_submissions';
    protected $pageTitle = 'Settings Contact Form';
    protected $menuTitle = 'Settings';
    protected $capability = 'read';
    protected $menuSlug = 'contact_form_settings';
    protected $position = 99;
    protected $controller;

    public function __construct($__dir__)
    {
        parent::__construct();
        $this->controller = new SettingsContactFormController($__dir__);
    }

    public function handleAction()
    {
        
    }

    public function handleView()
    {        
        return $this->controller->index();
    }
}