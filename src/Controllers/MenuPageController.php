<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;
use CheeVT\SettingsAPI\ExampleSettingsAPI;

class MenuPageController extends Controller
{
    public function __construct($__dir__)
    {
        parent::__construct($__dir__);
        $this->settiingsAPI = new ExampleSettingsAPI();
    }   

    public function index()
    {
        $this->renderView('cheevt_settings/page');
    }

    
}