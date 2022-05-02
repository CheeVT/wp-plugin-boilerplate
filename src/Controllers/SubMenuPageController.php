<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;
use CheeVT\Core\SubMenuPage;

class SubMenuPageController extends Controller
{
    use SubMenuPage;

    public function __construct($__dir__)
    {
        parent::__construct($__dir__);

        $this->initAdminSubMenuPage([
            'parent_slug' => 'cheevt_settings',
            'page_title' => 'CheeVT SubSettings',
            'menu_title' => 'CheeVT SubSettings',
            'capability' => 'read',
            'menu_slug' => 'cheevt_subsettings',
            'icon_url' => '',
            'position' => 99,
            'function' => '',
        ]);
    }

    public function index()
    {
        $this->renderView('index');
    }

    
}