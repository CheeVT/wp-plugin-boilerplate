<?php

namespace CheeVT\Core;

trait SubMenuPage
{
    public function initAdminSubMenuPage($subMenuPageParams)
    {
        $this->subMenuPageParams = $subMenuPageParams;
        add_action('admin_menu', [$this, 'settingsSubMenuPage']);
    }

    public function settingsSubMenuPage()
    {
        if(!isset($this->subMenuPageParams['parent_slug']) ||
            !isset($this->subMenuPageParams['page_title']) ||
            !isset($this->subMenuPageParams['menu_title']) ||
            !isset($this->subMenuPageParams['menu_slug'])) {
                return;
        }

        $subMenuPage = add_submenu_page(
            $this->subMenuPageParams['parent_slug'],
            $this->subMenuPageParams['page_title'],
            $this->subMenuPageParams['menu_title'],
            $this->subMenuPageParams['capability'],
            $this->subMenuPageParams['menu_slug'],
            [$this, 'handleView'],
            $this->subMenuPageParams['position']
        );

        //add_action('load-'.$subMenuPage, [$this, 'handleAction']);
    }

    public function handleView()
	{
        
		/*if ($this->action === 'view' && $this->requestHasEntity()) {
			return $this->show($this->getEntityId());
		} */
        return $this->index();
	}
}