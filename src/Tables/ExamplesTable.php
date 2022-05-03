<?php

namespace CheeVT\Tables;

use CheeVT\Core\Abstracts\DatabaseTable;

class ExamplesTable extends DatabaseTable
{
    protected $tableName = 'examples';

    public function queryStatement()
    {
        return sprintf('CREATE TABLE %s (
			ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
			example_col_1 VARCHAR(250) NULL,
			example_col_2 VARCHAR(250) NULL,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	        PRIMARY KEY  (ID)
		) %s',
		$this->getName(),
		$this->wpdb->get_charset_collate());
    }
}