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

	public function getListTableItems($limit, $page, $orderby = 'ID', $direction = 'DESC')
	{
		$query = sprintf(' SELECT * FROM %s ', $this->table->getName());
		$query .= sprintf(' ORDER BY %s %s ', $orderby, $direction);
		$query .= sprintf(' LIMIT %s OFFSET %s ', $limit, ($page * $limit) - $limit);

		return $this->wpdb->get_results($query, ARRAY_A);
	}
}