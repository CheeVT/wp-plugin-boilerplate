<?php

namespace CheeVT\Shortcodes;

use CheeVT\Core\Abstracts\Shortcode;

class ContactFormShortcode extends Shortcode
{
    protected $shortcode = 'contact-form';

    public function renderShortcode($atts, $content)
    {
        if($atts) extract($atts);

        ob_start();
        include $this->__dir__ . '/views/shortcodes/contact-form.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}