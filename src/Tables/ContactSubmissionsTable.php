<?php

namespace CheeVT\Tables;

use CheeVT\Core\Abstracts\DatabaseTable;

class ContactSubmissionsTable extends DatabaseTable
{
    protected $tableName = 'contact_submissions';

    public function queryStatement()
    {
        return sprintf('CREATE TABLE %s (
			ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
			name VARCHAR(50) NULL,
			email VARCHAR(100) NULL,
			subject VARCHAR(100) NULL,
			message VARCHAR(250) NULL,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	        PRIMARY KEY  (ID)
		) %s',
		$this->getName(),
		$this->wpdb->get_charset_collate());
    }
}