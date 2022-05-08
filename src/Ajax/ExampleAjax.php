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
        $this->request->validate();
        //$request = new ExampleFormRequest();
        //print_r($this->request->getAll());
        //print_r($this->request->validate());
        wp_send_json_success([
            'message' => __('Example ajax function has successfully executed!', 'cheevt-plugin-boilerplate'),
        ], 200);
    }
}