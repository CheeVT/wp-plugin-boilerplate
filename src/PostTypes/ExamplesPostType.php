<?php

namespace CheeVT\PostTypes;

use CheeVT\Core\Abstracts\PostType;

class ExamplesPostType extends PostType
{
    protected $postTypeData = [];

    public function __construct()
    {
        $this->postTypeData = [
            'post_type' => 'example_post_type',
            'name' => 'Examples',
            'label' => 'Examples',
            'singular_name' => 'Example',
            'rewrite' => 'example_posts',
            'textdomain' => 'lng_cheevt_boilerplate'
        ];
        parent::__construct();
    }
}