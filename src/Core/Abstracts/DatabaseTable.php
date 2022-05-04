<?php

namespace CheeVT\Core\Abstracts;

abstract class DatabaseTable
{
    protected $wpdb;

    public function __construct()
    {
        global $wpdb;
        
        $this->wpdb = $wpdb;
    }

    abstract public function queryStatement();

    public function create()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    dbDelta($this->queryStatement());
    }

    public function drop()
    {
        $this->wpdb->query(
	    	sprintf('DROP TABLE IF EXISTS %s',
            $this->getName())
	    );
    }

    public function getName()
    {
        return $this->wpdb->prefix . $this->tableName;
    }
}