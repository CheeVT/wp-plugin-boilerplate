<?php

namespace CheeVT\Core\Abstracts;

abstract class Shortcode
{
    protected $shortcode;

    public function __construct()
    {
        if(!isset($this->shortcode)) {
            throw new \Exception(get_class($this) . ' must have a $shortcode');
        }
        add_shortcode($this->shortcode, [$this, 'renderShortcode']);
    }
    
    abstract public function renderShortcode($atts);
}