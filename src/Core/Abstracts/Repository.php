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

    public function store($data)
	{
		$this->wpdb->insert(
			$this->table->getName(), $data
		);

		return $this->wpdb->insert_id;
	}
}