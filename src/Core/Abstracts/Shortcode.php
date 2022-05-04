<?php

namespace CheeVT\Core\Abstracts;

abstract class Shortcode
{
    protected $shortcode;
    protected $__dir__;

    public function __construct($__dir__)
    {
        if(!isset($this->shortcode)) {
            throw new \Exception(get_class($this) . ' must have a $shortcode');
        }
        $this->__dir__ = $__dir__;
        add_shortcode($this->shortcode, [$this, 'renderShortcode']);
    }
    
    abstract public function renderShortcode($atts, $content);
}