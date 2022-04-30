<?php

namespace CheeVT\SettingsAPI;

use CheeVT\Core\SettingsAPI;

class ExampleSettingsAPI extends SettingsAPI
{
    public $option_group = 'example_option_group';
    public $option_name = 'example_option_group';
    public $page = 'cheevt_settings';
    public $sections = [
        [
            'id' => 'example_section',
            'title' => 'Example section',
            'description' => '<p>Main description of this section here.</p>',
            'fields' => [
                [
                    'id' => 'example_field',
                    'title' => 'Example field',
                    'type' => 'text'
                ],
                [
                    'id' => 'example_field_2',
                    'title' => 'Example field 2',
                    'type' => 'select',
                    'options' => ['key1' => 'Key 1', 'key2' => 'Key 2', 'key3' => 'Key 3']
                ],
                [
                    'id' => 'example_field_3',
                    'title' => 'Example field 3',
                    'type' => 'checkbox',
                    'options' => ['key1' => 'Key 1', 'key2' => 'Key 2', 'key3' => 'Key 3']
                ],
                [
                    'id' => 'example_field_4',
                    'title' => 'Example field 4',
                    'type' => 'checkbox',
                    'options' => ['enabled' => 'Enabled']
                ]
            ]
        ]
    ];

}