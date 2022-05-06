<?php

namespace CheeVT\ListTables;

use CheeVT\Core\Abstracts\ListTable;
use CheeVT\Core\Abstracts\Repository;

class ContacFormtSubmissionsListTable extends ListTable
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        parent::__construct([
			'singular' => 'Submission', // Singular name of the listed records.
			'plural' => 'Submissions',  // Plural name of the listed records.
			'ajax' => false,            // Does this table support ajax?
		]);

        $this->repository = $repository;

        $this->prepare_items();
    }

    public function get_columns()
	{
		$columns = [
			'cb' => '<input type="checkbox" />', // Render a checkbox instead of text.
			'name' => _x( 'Name', 'Column label', 'wp-list-table-example'),
			'email' => _x('Email', 'Column label', 'wp-list-table-example'),
			'subject' => _x('Subject', 'Column label', 'wp-list-table-example'),
			'created_at' => _x('Submitted at', 'Column label', 'wp-list-table-example'),
		];

		return $columns;
    }

    protected function get_sortable_columns()
	{
		$sortable_columns = [
			'name' => ['name', false],
			'email' => ['email', false],
			'subject' => ['subject', false],
			'created_at' => ['created_at', false],
		];

		return $sortable_columns;
	}

    protected function get_bulk_actions()
	{
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}

    protected function column_default($item, $column_name)
	{
		switch ($column_name) {
			case 'name':
				return $item['name'];
			case 'email':
				return $item['email'];
			case 'subject':
				return $item['subject'];			
			case 'created_at':
				return date('F d, Y - H:i', strtotime($item[$column_name]));
			default:
				return print_r($item, true); // Show the whole array for troubleshooting purposes.
		}
    }

    protected function column_cb($item)
	{
		return sprintf('<input type="checkbox" name="entity_ids[]" value="%s" />', $item['ID']);
    }

    protected function column_name($item)
	{
		$page = wp_unslash($_REQUEST['page']);

		$view_query_args = [
			'page' => $page,
			'action' => 'view',
			'entity_id' => $item['ID'],
		];

		$delete_query_args = [
			'page' => $page,
			'action' => 'delete',
			'entity_id' => $item['ID'],
		];

		$actions = [
			'view' => sprintf('<a href="%1$s">%2$s</a>',
				add_query_arg($view_query_args, 'admin.php'), 'View'
			),
			'delete' => sprintf('<a href="%1$s">%2$s</a>',
				add_query_arg($delete_query_args, 'admin.php'), 'Delete'
			)
		];

		return sprintf('<a href="%1$s"><strong>%2$s</strong></a> %3$s',
			add_query_arg($view_query_args, 'admin.php'),
			$item['name'],
			$this->row_actions($actions)
		);
	}    
}