<?php

namespace CheeVT\Shortcodes;

use CheeVT\Core\Abstracts\Shortcode;

class ExampleShortcode extends Shortcode
{
    protected $shortcode = 'example-shortcode';

    public function renderShortcode($atts)
    {
        //var_dump($atts);
        return 'Hello WORLD!!!';
    }
}