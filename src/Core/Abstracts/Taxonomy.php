<?php

namespace CheeVT\Core\Abstracts;

use HaydenPierce\ClassFinder\ClassFinder;

abstract class Taxonomy
{
    protected $taxonomyData = [];

    public function __construct()
    {
        add_action('init', [$this, 'initCustomTaxonomy']);
    }

    /**
     * Register custom taxonomies
     * https://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    public function initCustomTaxonomy()
    {
        if(!isset($this->taxonomyData['taxonomy']) ||
            !isset($this->taxonomyData['post_type']) || 
            !isset($this->taxonomyData['singular_name']) || 
            !isset($this->taxonomyData['name'])) {
            return;
        }

        register_taxonomy($this->taxonomyData['taxonomy'], $this->taxonomyData['post_type'], [
            // Hierarchical taxonomy (like categories)
            'public' => true,
            'hierarchical' => true,
            // This array of options controls the labels displayed in the WordPress Admin UI
            'labels' => [
                'name' => _x($this->taxonomyData['name'], $this->taxonomyData['textdomain']),
                'singular_name' => _x($this->taxonomyData['singular_name'], $this->taxonomyData['textdomain']),
                'search_items' =>  isset($this->taxonomyData['search_items']) ?
                    __($this->taxonomyData['search_items'], $this->taxonomyData['textdomain']) :
                    __('Search items', $this->taxonomyData['textdomain']),
                'all_items' => isset($this->taxonomyData['all_items']) ?
                    __($this->taxonomyData['all_items'], $this->taxonomyData['textdomain']) :
                    __('All items', $this->taxonomyData['textdomain']),
                'parent_item' => isset($this->taxonomyData['parent_item']) ?
                    __($this->taxonomyData['parent_item'], $this->taxonomyData['textdomain']) :
                    __('Parent item', $this->taxonomyData['textdomain']),
                'parent_item_colon' => isset($this->taxonomyData['parent_item_colon']) ?
                    __($this->taxonomyData['parent_item_colon'], $this->taxonomyData['textdomain']) :
                    __('Parent item column', $this->taxonomyData['textdomain']),
                'edit_item' => isset($this->taxonomyData['edit_item']) ?
                    __($this->taxonomyData['edit_item'], $this->taxonomyData['textdomain']) :
                    __('Edit item', $this->taxonomyData['textdomain']),
                'update_item' => isset($this->taxonomyData['update_item']) ?
                    __($this->taxonomyData['update_item'], $this->taxonomyData['textdomain']) :
                    __('Update item', $this->taxonomyData['textdomain']),
                'add_new_item' => isset($this->taxonomyData['add_new_item']) ?
                    __($this->taxonomyData['add_new_item'], $this->taxonomyData['textdomain']) :
                    __('Add new item', $this->taxonomyData['textdomain']),
                'new_item_name' => isset($this->taxonomyData['new_item_name']) ?
                    __($this->taxonomyData['new_item_name'], $this->taxonomyData['textdomain']) :
                    __('New item name', $this->taxonomyData['textdomain']),
                'menu_name' => isset($this->taxonomyData['menu_name']) ?
                    __($this->taxonomyData['menu_name'], $this->taxonomyData['textdomain']) :
                    __('Menu name', $this->taxonomyData['textdomain']),
            ],
            // Control the slugs used for this taxonomy
            'rewrite' => [
                'slug' => $this->taxonomyData['rewrite']['slug'], // This controls the base slug that will display before each term
                'with_front' => isset($this->taxonomyData['rewrite']['with_front']) ? $this->taxonomyData['rewrite']['with_front'] : false, // Don't display the category base before "/locations/"
                'hierarchical' => isset($this->taxonomyData['rewrite']['hierarchical']) ? $this->taxonomyData['rewrite']['hierarchical'] : true // This will allow URL's like "/locations/boston/cambridge/"
            ],
        ]);
    }
}