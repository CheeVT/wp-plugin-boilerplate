<?php

namespace CheeVT\Ajax;

class Example
{
    public function __construct()
    {
        add_action('wp_ajax_example_func', [$this, 'exampleFunction']);
        add_action('wp_ajax_nopriv_example_func', [$this, 'exampleFunction']);        
    }

    public function exampleFunction()
    {
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Example ajax function has successfully executed!',
        ]);

        exit;
    }
}