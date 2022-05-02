<?php

namespace CheeVT\AdminPages;

use CheeVT\Core\Abstracts\AdminPage;
use CheeVT\Controllers\MenuPageController;

class SettingsAdminPage extends AdminPage
{
    protected $pageTitle = 'CheeVT Settings';
    protected $menuTitle = 'CheeVT Settings';
    protected $capability = 'read';
    protected $menuSlug = 'cheevt_settings';
    protected $position = 99;
    protected $controller;

    public function __construct($__dir__)
    {
        parent::__construct();
        $this->controller = new MenuPageController($__dir__);
    }

    public function handleView()
    {        
        return $this->controller->index();
    }
}