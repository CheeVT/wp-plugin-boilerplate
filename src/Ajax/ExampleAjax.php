<?php

namespace CheeVT\Ajax;

use CheeVT\Core\Abstracts\Ajax;
use CheeVT\Ajax\Requests\ExampleFormRequest;

class ExampleAjax extends Ajax
{
    protected $action = 'example_func';

    public function __construct()
    {
        parent::__construct();
        $this->request = new ExampleFormRequest();
    }

    public function defineAjax()
    {
        //$request = new ExampleFormRequest();
        //print_r($this->request->getAll());
        //print_r($this->request->validate());
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Example ajax function has successfully executed!',
        ]);

        exit;
    }
}