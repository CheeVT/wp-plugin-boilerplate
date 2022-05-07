<?php

namespace CheeVT;

use CheeVT\Core\Loader;
use CheeVT\Core\DBSchema;

class Plugin
{
    public function __construct($__file__, $__dir__)
    {
        $this->__file__ = $__file__;
        $this->__dir__ = $__dir__;

        Loader::init([
            \CheeVT\Ajax::class,
            \CheeVT\Shortcodes::class,
            \CheeVT\PostTypes::class,
            \CheeVT\Taxonomies::class,
            \CheeVT\AdminPages::class,
        ], $__dir__);        
        
        register_activation_hook($this->__file__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'initScripts']);
        register_uninstall_hook($this->__file__, [static::class, 'uninstall']);
    }

    public function activate()
    {
        DBSchema::create([\CheeVT\Tables::class]);
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
            'nonce' => wp_create_nonce()
        ]);
    }

    public function enqueueStyles()
    {
        $cssFileUrl = plugin_dir_url($this->__file__) . 'dist/plugin.css';

        wp_register_style('cheevt-plugin-boilerplate-css', $cssFileUrl, [], false);
        wp_enqueue_style('cheevt-plugin-boilerplate-css');
    }

    public static function uninstall()
    {
        DBSchema::drop([\CheeVT\Tables::class]);
    }
}