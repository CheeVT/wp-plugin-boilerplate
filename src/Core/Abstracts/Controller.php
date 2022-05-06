<?php

namespace CheeVT\Core\Abstracts;

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

    public function getId()
	{
		if (isset($_REQUEST['id'])) {
			return $_REQUEST['id'];
		}
        return null;
	}

    public function getIds()
	{
		if (isset($_REQUEST['ids'])) {
			return $_REQUEST['ids'];
		}
        return [];
	}

    public function delete($id)
    {
        $this->repository->delete($id);
        $this->redirectToIndex();
    }

    public function bulkDelete($ids)
    {
        foreach($ids as $id) {
            $this->repository->delete($id);
        }
        $this->redirectToIndex();
    }

    public function renderView($view, $args = [])
	{
		extract($args);

		include $this->__dir__ . '/views/' . $this->page . '/' . $view . '.php';
	}

    public function redirectToIndex($params = [])
	{
		$toUrl = add_query_arg(array_merge(
			['page' => $this->page], $params
		), 'admin.php');

		wp_redirect($toUrl); 
        exit;
	}
}