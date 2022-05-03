<?php

namespace CheeVT\Core\Abstracts;

use CheeVT\Core\Request;

abstract class Ajax
{
    protected $request;

    public function __construct()
    {
        if(!isset($this->action)) {
            throw new \Exception(get_class($this) . ' must have a $action');
        }

        $this->request = new Request();

        add_action('wp_ajax_' . $this->action, [$this, 'defineAjax']);
        add_action('wp_ajax_nopriv_' . $this->action, [$this, 'defineAjax']);        
    }

    abstract public function defineAjax();
}