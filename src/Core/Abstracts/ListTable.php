<?php

namespace CheeVT\Core\Abstracts;

abstract class ListTable extends \WP_List_Table
{
	protected $perPage;
	protected $currentPage;
	protected $orderBy;
	protected $direction;
	protected $totalItems;

    public function prepare_items()
	{
		$_SERVER['REQUEST_URI'] = remove_query_arg('_wp_http_referer', $_SERVER['REQUEST_URI']);
		$_SERVER['REQUEST_URI'] = remove_query_arg('_wpnonce', $_SERVER['REQUEST_URI']);

		$columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);

		$this->perPage = $this->get_items_per_page('items_per_page', 20);
		$this->currentPage = $this->get_pagenum();
		//$total_items  = $this->repository->countListTableItems();

		$this->orderBy = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'ID';
		$this->direction = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';

		$total_pages = ceil($this->totalItems / $this->perPage);

		/*$this->items = $this->repository->getListTableItems(
			$per_page, $current_page, $orderby, $direction
		);*/

		$this->set_pagination_args([
			'total_items' => $this->totalItems, // WE have to calculate the total number of items
			'per_page'    => $this->perPage,    // WE have to determine how many items to show on a page
			'total_pages' => $total_pages, // WE have to calculate the total number of pages.
		]);
	}

	public function setItems()
	{
		$this->items = $this->repository->getListTableItems(
			$this->perPage, $this->currentPage, $this->orderBy, $this->direction
		);

		$this->totalItems = $this->repository->countListTableItems();

		$this->prepare_items();
	}

	public function setSearchItems($searchTerm)
	{
		$this->items = $this->repository->getSearchListTableItems(
			$searchTerm, $this->perPage, $this->currentPage, $this->orderBy, $this->direction
		);

		$this->totalItems = $this->repository->countSearchListTableItems($searchTerm);

		$this->prepare_items();
	}
}