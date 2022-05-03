<?php

namespace CheeVT\Taxonomies;

use CheeVT\Core\Abstracts\Taxonomy;

class ExampleTaxonomy extends Taxonomy
{
    protected $taxonomyData = [];

    public function __construct()
    {
        $this->taxonomyData = [
            'post_type' => 'example_post_type',
            'taxonomy' => 'type_example_taxonomy',
            'name' => 'Types',
            'singular_name' => 'Type',
            'rewrite' => [
                'slug' => 'types_example',
            ],
            'textdomain' => 'lng_cheevt_boilerplate'
        ];
        parent::__construct();
    }
}