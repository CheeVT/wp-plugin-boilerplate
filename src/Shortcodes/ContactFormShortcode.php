<?php

namespace CheeVT\Shortcodes;

use CheeVT\Core\Abstracts\Shortcode;

class ContactFormShortcode extends Shortcode
{
    protected $shortcode = 'contact-form';

    public function renderShortcode($atts, $content)
    {
        return $this->renderView('contact-form', $atts);
    }
}