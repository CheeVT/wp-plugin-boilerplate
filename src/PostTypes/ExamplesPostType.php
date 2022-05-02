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
            'singular_name' => 'Example',
            'rewrite' => 'example_posts'
        ];
        parent::__construct();
    }
}