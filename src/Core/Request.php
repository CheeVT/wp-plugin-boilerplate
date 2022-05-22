<?php

namespace CheeVT\Core;

use Particle\Validator\Validator;

class Request
{
    protected $data = [];
	protected $methods = [];
    protected $validator;

    public function __construct()
    {
        $this->validator = new Validator;

        foreach (array_merge($_REQUEST, $_FILES) as $key => $value) {
            //var_dump($key);
            
            if(is_array($value)) {
                foreach($value as $k => $v) {
                    $this->data[$key][$k] = sanitize_text_field($v);
                }
            } else {
                $this->data[$key] = sanitize_text_field($value);
            }
		}
    }

    public function validateNonce()
    {
        if(wp_verify_nonce($this->nonce)) return;

        http_response_code(400);
        header('Content-type: application/json');
        print json_encode([
            'message' => 'Nonce error'
        ]);
        exit;
    }

    public function validate()
    {
        $this->validateNonce();
        $this->rules();
        return $this->validator->validate($this->data['data']);
    }

    public function validateRestAPI()
    {
        $this->rules();
        return $this->validator->validate($this->data);
    }

    public function apiBody($data)
    {
        $this->data = json_decode($data, true);

        return $this;
    }

    public function __get($field)
    {
        if(isset($this->data[$field])) {
            return $this->data[$field];
        }

        return null;
    }

    public function getAll()
    {
        return $this->data['data'];
    }
}