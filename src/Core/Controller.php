<?php

namespace CheeVT\Core;

abstract class Controller
{
    protected $__dir__;
    protected $action;
    protected $page;

    public function __construct($__dir__)
    {
        $this->__dir__ = $__dir__;
        $this->action = $this->getAction();
        $this->page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    }

    public function getAction()
	{
		if (isset($_REQUEST['action'])) {
			return $_REQUEST['action'];
		}
        return null;
	}

    public function renderView($view, $args = [])
	{
		extract($args);

		include $this->__dir__ . '/views/' . $this->page . '/' . $view . '.php';
	}
}