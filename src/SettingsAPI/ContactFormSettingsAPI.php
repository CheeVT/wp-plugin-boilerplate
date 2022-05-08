<?php

namespace CheeVT\SettingsAPI;

use CheeVT\Core\Abstracts\SettingsAPI;

class ContactFormSettingsAPI extends SettingsAPI
{
    public $option_group = 'contact_form_option_group';
    public $option_name = 'contact_form_option_group';
    public $page = 'contact_form_settings';
    public $sections = [
        [
            'id' => 'contact_form_section',
            'title' => 'Configure contact form options',
            'description' => '<p>Put shortcode <b>[contact-form]</b> on the page or post to render contact form.</p>',
            'fields' => [
                [
                    'id' => 'send_email_to',
                    'title' => 'Mail to:',
                    'type' => 'text'
                ],
                [
                    'id' => 'send_email_enabled',
                    'title' => 'Send email:',
                    'type' => 'checkbox',
                    'options' => ['enabled' => 'Enabled']
                ],
                [
                    'id' => 'store_to_db_enabled',
                    'title' => 'Store to database:',
                    'type' => 'checkbox',
                    'options' => ['enabled' => 'Enabled']
                ],
            ]
        ]
    ];

}