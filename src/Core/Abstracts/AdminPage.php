<?php

namespace CheeVT\Core\Abstracts;

abstract class AdminPage
{
    protected $parentSlug = '';
    protected $pageTitle = '';
    protected $menuTitle = '';
    protected $capability = ['read'];
    protected $menuSlug = '';
    protected $iconUrl = '';
    protected $position = 99;

    public function __construct()
    {
        add_action('admin_menu', [$this, 'settingsMenuPage']);
    }

    public function settingsMenuPage()
    {
        if(!isset($this->pageTitle) ||
            !isset($this->menuTitle) ||
            !isset($this->menuSlug)) {
                return;
        }
        
        if($this->parentSlug != '') {
            $page = $this->addSubMenuPage();
        } else {
            $page = $this->addMenuPage();
        }
        
		add_action('load-'.$page, [$this, 'handleAction']);
    }

    private function addMenuPage()
    {
        return add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'handleView'],
            $this->iconUrl,
            $this->position
        );
    }

    private function addSubMenuPage()
    {
        return add_submenu_page(
            $this->parentSlug,
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'handleView'],
            $this->position
        );
    }

    abstract public function handleAction();
    abstract public function handleView();
}