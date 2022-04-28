<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Controller;
use CheeVT\Core\MenuPage;

class MenuPageController extends Controller
{
    use MenuPage;

    public function __construct($__dir__)
    {
        parent::__construct($__dir__);

        $this->initAdminMenuPage([
            'page_title' => 'CheeVT Settings',
            'menu_title' => 'CheeVT Settings',
            'capability' => 'read',
            'menu_slug' => 'cheevt_settings',
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