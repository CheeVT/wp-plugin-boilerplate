<?php

namespace CheeVT\Core\Abstracts;

abstract class Ajax
{
    public function __construct()
    {
        if(!isset($this->action)) {
            throw new \Exception(get_class($this) . ' must have a $action');
        }

        add_action('wp_ajax_' . $this->action, [$this, 'defineAjax']);
        add_action('wp_ajax_nopriv_' . $this->action, [$this, 'defineAjax']);        
    }

    abstract public function defineAjax();
}