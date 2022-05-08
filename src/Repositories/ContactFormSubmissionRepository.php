<?php

namespace CheeVT\Repositories;

use CheeVT\Core\Abstracts\Repository;
use CheeVT\Core\Abstracts\DatabaseTable;
use CheeVT\Tables\ContactSubmissionsTable;

class ContactFormSubmissionRepository extends Repository
{
    public function getTable() : DatabaseTable
    {
        return new ContactSubmissionsTable;
    }

    public function countListTableItems()
	{
		return $this->wpdb->get_var(sprintf('
			SELECT COUNT(1) FROM %s
		', $this->table->getName()));
	}

	public function countSearchListTableItems($searchTerm)
	{
		$query = 'SELECT COUNT(1) FROM ' . $this->table->getName();
		$query .= ' WHERE name LIKE "%'.$searchTerm.'%" OR';
		$query .= ' email LIKE "%'.$searchTerm.'%" OR';
		$query .= ' subject LIKE "%'.$searchTerm.'%";';

		return $this->wpdb->get_var($query);
	}

	public function getListTableItems($limit, $page, $orderby = 'ID', $direction = 'DESC')
	{
		$query = sprintf(' SELECT * FROM %s ', $this->table->getName());
		$query .= sprintf(' ORDER BY %s %s ', $orderby, $direction);
		$query .= sprintf(' LIMIT %s OFFSET %s ', $limit, ($page * $limit) - $limit);

		return esc_sql($this->wpdb->get_results($query, ARRAY_A));
	}

	public function getSearchListTableItems($searchTerm, $limit, $page, $orderby = 'ID', $direction = 'DESC')
	{
		$query = sprintf(' SELECT * FROM %s ', $this->table->getName());
		$query .= ' WHERE name LIKE "%'.$searchTerm.'%" OR';
		$query .= ' email LIKE "%'.$searchTerm.'%" OR';
		$query .= ' subject LIKE "%'.$searchTerm.'%"';
		/*$query .= sprintf(' WHERE %s LIKE "%%s%" ', 'name', $searchTerm);
		$query .= sprintf(' %s LIKE "%%s%" ', 'email', $searchTerm);
		$query .= sprintf(' %s LIKE "%%s%" ', 'subject', $searchTerm);*/
		$query .= sprintf(' ORDER BY %s %s ', $orderby, $direction);
		$query .= sprintf(' LIMIT %s OFFSET %s ', $limit, ($page * $limit) - $limit);

		return esc_sql($this->wpdb->get_results($query, ARRAY_A));
	}
}