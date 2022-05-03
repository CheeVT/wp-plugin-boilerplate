<?php

namespace CheeVT\Core;

class DBSchema
{
    public static function create(array $namespace)
    {
        $tables = Loader::init($namespace)[0];

        if(empty($tables)) return;
        
        foreach($tables as $table) {
            $table->create();
        }
    }

    public static function drop(array $namespace)
    {
        $tables = Loader::init($namespace)[0];

        if(empty($tables)) return;
        
        foreach($tables as $table) {
            $table->drop();
        }
    }
}