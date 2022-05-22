<?php

namespace CheeVT\Core\Abstracts;

abstract class API
{
    protected $namespace = 'cheevt';
    protected $method = 'GET';

    public function __construct()
    {
        if(!isset($this->route)) {
            throw new \Exception(get_class($this) . ' must have a $route');
        }

        add_action('rest_api_init', function() {
            register_rest_route($this->namespace, $this->route, [
                'methods' => $this->method,
                'callback' => [$this, 'handle']
            ]);
        });
    }

    abstract public function handle($params);
}