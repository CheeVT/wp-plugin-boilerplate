<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Abstracts\Ajax;

class ExampleAjax extends Ajax
{
    protected $action = 'example_func';

    public function defineAjax()
    {
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Example ajax function has successfully executed!',
        ]);

        exit;
    }
}