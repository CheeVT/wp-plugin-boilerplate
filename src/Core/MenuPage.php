<?php

namespace CheeVT\Core;

trait MenuPage
{
    public function initAdminMenuPage($menuPageParams)
    {
        $this->menuPageParams = $menuPageParams;
        add_action('admin_menu', [$this, 'settingsMenuPage']);
    }

    public function settingsMenuPage()
    {
        if(!isset($this->menuPageParams['page_title']) ||
            !isset($this->menuPageParams['menu_title']) ||
            !isset($this->menuPageParams['menu_slug'])) {
                return;
        }

        $menuPage = add_menu_page(
            $this->menuPageParams['page_title'],
            $this->menuPageParams['menu_title'],
            $this->menuPageParams['capability'],
            $this->menuPageParams['menu_slug'],
            [$this, 'handleView'],
            $this->menuPageParams['icon_url'],
            $this->menuPageParams['position']
        );
		//add_action('load-'.$menuPage, [$this, 'handleAction']);
    }

    public function handleView()
	{
        return $this->index();
	}
}