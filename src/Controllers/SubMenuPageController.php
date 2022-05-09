<?php

namespace CheeVT\Controllers;

use CheeVT\Core\Abstracts\Controller;

class SubMenuPageController extends Controller
{
    public function __construct($__dir__)
    {
        parent::__construct($__dir__);
    }

    public function index()
    {
        $this->renderView('cheevt_settings/subpage');
    }

    
}