<?php

namespace CheeVT\Core\Abstracts;

use HaydenPierce\ClassFinder\ClassFinder;

abstract class PostType
{
    protected $postTypeData = [];

    public function __construct()
    {
        add_action('init', [$this, 'initCustomPostType']);
    }

    /**
     * https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function initCustomPostType()
    {
        if(!isset($this->postTypeData['post_type']) ||
            !isset($this->postTypeData['singular_name']) || 
            !isset($this->postTypeData['name'])) {
            return;
        }

        register_post_type($this->postTypeData['post_type'], [
            'label' => __($this->postTypeData['label'], $this->postTypeData['textdomain']),
		    'description' => isset($this->postTypeData['description']) ? 
                        __($this->postTypeData['description'], $this->postTypeData['textdomain']) : '',
            'labels' => [
                'name' => __($this->postTypeData['name'], $this->postTypeData['textdomain']),
                'singular_name' => __($this->postTypeData['singular_name'], $this->postTypeData['textdomain']),
            ],
            'public' => isset($this->postTypeData['public']) ? $this->postTypeData['public'] : true,
            'has_archive' => isset($this->postTypeData['has_archive']) ? $this->postTypeData['has_archive'] : true,
            'rewrite' => array('slug' => $this->postTypeData['rewrite']),
            'show_in_rest' => isset($this->postTypeData['show_in_rest']) ? $this->postTypeData['show_in_rest'] : true,
            'show_in_admin_bar' => isset($this->postTypeData['show_in_admin_bar']) ? $this->postTypeData['show_in_admin_bar'] : true,
            'taxonomies' => isset($this->postTypeData['taxonomies']) ? $this->postTypeData['taxonomies'] : [],
            'hierarchical' => isset($this->postTypeData['hierarchical']) ? $this->postTypeData['hierarchical'] : false,
            'show_ui' => isset($this->postTypeData['show_ui']) ? $this->postTypeData['show_ui'] : true,
            'show_in_menu' => isset($this->postTypeData['show_in_menu']) ? $this->postTypeData['show_in_menu'] : true,
            'menu_position' => isset($this->postTypeData['menu_position']) ? $this->postTypeData['menu_position'] : 10,
            'show_in_nav_menus' => isset($this->postTypeData['show_in_nav_menus']) ? $this->postTypeData['show_in_nav_menus'] : true,
            'can_export' => isset($this->postTypeData['can_export']) ? $this->postTypeData['can_export'] : true,
            'exclude_from_search' => isset($this->postTypeData['exclude_from_search']) ? $this->postTypeData['exclude_from_search'] : false,
            'publicly_queryable' => isset($this->postTypeData['publicly_queryable']) ? $this->postTypeData['publicly_queryable'] : true,
            'capability_type' => 'page',
        ]);
    }
}