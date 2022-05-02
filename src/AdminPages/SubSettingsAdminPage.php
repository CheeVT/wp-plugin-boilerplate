<?php

namespace CheeVT\AdminPages;

use CheeVT\Core\Abstracts\AdminPage;
use CheeVT\Controllers\SubMenuPageController;

class SubSettingsAdminPage extends AdminPage
{
    protected $parentSlug = 'cheevt_settings';
    protected $pageTitle = 'CheeVT SubSettings';
    protected $menuTitle = 'CheeVT SubSettings';
    protected $capability = 'read';
    protected $menuSlug = 'cheevt_subsettings';
    protected $position = 99;
    protected $controller;

    public function __construct($__dir__)
    {
        parent::__construct();
        $this->controller = new SubMenuPageController($__dir__);
    }

    public function handleView()
    {        
        return $this->controller->index();
    }
}