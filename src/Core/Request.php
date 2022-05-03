<?php

namespace CheeVT\Core;

class Request
{
    protected $data = [];

	protected $methods = [];

    public function __construct()
    {
        foreach (array_merge($_REQUEST, $_FILES) as $key => $value) {
            //var_dump($key);
            
            if(is_array($value)) {
                foreach($value as $k => $v) {
                    $this->data[$key][$k] = trim($v);
                }
            } else {
                $this->data[$key] = trim($value);
            }
		}
    }

    public function __get($field)
    {
        if(isset($this->data[$field])) {
            return $this->data[$field];
        }

        return null;
    }

    public function getAll()
    {
        return $this->data['data'];
    }
}