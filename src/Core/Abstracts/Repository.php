<?php

namespace CheeVT\Core\Abstracts;

abstract class Repository
{
    public function __construct()
	{
		global $wpdb;

		$this->wpdb = $wpdb;
		$this->table = $this->getTable();
	}

    abstract public function getTable() : DatabaseTable;

	public function find($id, $column = 'ID')
	{
		return $this->wpdb->get_row(sprintf('
			SELECT * FROM %s WHERE %s = "%s"
		', $this->table->getName(), $column, $id));
	}

    public function store($data)
	{
		$this->wpdb->insert(
			$this->table->getName(), $data
		);

		return $this->wpdb->insert_id;
	}

	public function delete($id, $column = 'ID')
	{
		$this->wpdb->delete(
			$this->table->getName(), [$column => $id]
		);
	}
}