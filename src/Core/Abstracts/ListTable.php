<?php

namespace CheeVT\Core\Abstracts;

abstract class ListTable extends \WP_List_Table
{
    public function prepare_items()
	{
		$_SERVER['REQUEST_URI'] = remove_query_arg( '_wp_http_referer', $_SERVER['REQUEST_URI'] );
		$_SERVER['REQUEST_URI'] = remove_query_arg( '_wpnonce', $_SERVER['REQUEST_URI'] );

		$columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);

		$per_page     = $this->get_items_per_page('nis_submissions_per_page', 20);
		$current_page = $this->get_pagenum();
		$total_items  = $this->repository->countListTableItems();

		$orderby = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : 'ID';
		$direction = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';

		$total_pages = ceil($total_items / $per_page);

		$this->items = $this->repository->getListTableItems(
			$per_page, $current_page, $orderby, $direction
		);

		$this->set_pagination_args([
			'total_items' => $total_items, // WE have to calculate the total number of items
			'per_page'    => $per_page,    // WE have to determine how many items to show on a page
			'total_pages' => $total_pages, // WE have to calculate the total number of pages.
		]);
	}
}