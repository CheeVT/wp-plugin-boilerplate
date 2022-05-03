<?php

namespace CheeVT\Tables;

use CheeVT\Core\Abstracts\DatabaseTable;

class BooksTable extends DatabaseTable
{
    protected $tableName = 'books';

    public function queryStatement()
    {
        return sprintf('CREATE TABLE %s (
			ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
			name VARCHAR(250) NULL,
			author VARCHAR(250) NULL,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	        PRIMARY KEY  (ID)
		) %s',
		$this->getName(),
		$this->wpdb->get_charset_collate());
    }
}