<?php

namespace CheeVT;

class Plugin
{
    public function __construct($__file__, $__dir__)
    {
        $this->__file__ = $__file__;
        $this->__dir__ = $__dir__;

        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    public function enqueueScripts()
    {
        $jsFileUrl = plugin_dir_url($this->__file__) . 'dist/plugin.js';
        $cssFileUrl = plugin_dir_url($this->__file__) . 'dist/plugin.css';

        wp_enqueue_script('cheevt-plugin-boilerplate-js', $jsFileUrl, [], false, true);
        wp_localize_script('cheevt-plugin-boilerplate-js', 'cheevt_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);

        wp_register_style('cheevt-plugin-boilerplate-css', $cssFileUrl, [], false);
        wp_enqueue_style('cheevt-plugin-boilerplate-css');
    }
}