<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;
use CheeVT\SettingsAPI\ContactFormSettingsAPI;

class SettingsContactFormController extends Controller
{
    public function __construct($__dir__)
    {
        parent::__construct($__dir__);
        $this->settiingsAPI = new ContactFormSettingsAPI();
    }

    public function index()
    {
        $this->renderView('contact_form/settings');
    }

    
}