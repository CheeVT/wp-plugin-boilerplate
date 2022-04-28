<?php

namespace CheeVT;

use CheeVT\Core\Ajax;
use CheeVT\Core\PostType;
use CheeVT\Core\Taxonomy;
use CheeVT\Controllers\MenuPageController;
use CheeVT\Controllers\SubMenuPageController;

class Plugin
{
    public function __construct($__file__, $__dir__)
    {
        $this->__file__ = $__file__;
        $this->__dir__ = $__dir__;
        Ajax::init();
        PostType::init();
        Taxonomy::init();
        new MenuPageController($__dir__);
        new SubMenuPageController($__dir__);
        
        add_action('plugins_loaded', [$this, 'initScripts']);
    }

    public function initScripts()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
    }

    public function enqueueScripts()
    {
        $jsFileUrl = plugin_dir_url($this->__file__) . 'dist/plugin.js';

        wp_enqueue_script('cheevt-plugin-boilerplate-js', $jsFileUrl, ['jquery'], false, true);
        wp_localize_script('cheevt-plugin-boilerplate-js', 'cheevt_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);        
    }

    public function enqueueStyles()
    {
        $cssFileUrl = plugin_dir_url($this->__file__) . 'dist/plugin.css';

        wp_register_style('cheevt-plugin-boilerplate-css', $cssFileUrl, [], false);
        wp_enqueue_style('cheevt-plugin-boilerplate-css');
    }
}