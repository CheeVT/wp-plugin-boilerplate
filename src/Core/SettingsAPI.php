<?php

namespace CheeVT\Core;

abstract class SettingsAPI
{
    protected $option_group;
    protected $option_name;
    protected $page;
    protected $sections;

    public function __construct()
    {
        add_action('admin_init', [$this, 'registerSettings']);
    }

    public function registerSettings()
    {
        register_setting(
            $this->option_group,
            $this->option_name,
            [$this, 'validateData']
        );

        $this->registerSettingsSections();
       }

    protected function registerSettingsSections()
    {
        if(is_array($this->sections)) {
            foreach($this->sections as $section) {
                add_settings_section(
                    $section['id'],
                    $section['title'],
                    function() use ($section) {
                        $this->sectionDescription($section);
                    },
                    $this->page
                );

                $this->registerSettingsFields($section);
            }
        }
    }

    protected function registerSettingsFields($section)
    {
        if(is_array($section['fields'])) {
            foreach($section['fields'] as $field) {
                add_settings_field(
                    $field['id'],
                    $field['title'],
                    //[$this, 'renderField'],
                    function() use ($field) {
                        $this->renderField($field);
                    },
                    $this->page,
                    $section['id']
                );
            }
        }
    }

    public function renderField($field)
    {
        //var_dump($field);
        $options = get_option($this->option_name);
        //var_dump($options);
        switch($field['type']) {
            case 'text':
                $this->renderInput($field);
                break;
            case 'select':
                $this->renderSelect($field);
                break;
            case 'checkbox':
                $this->renderCheckbox($field);
                break;
        }
        
    }

    protected function renderInput($field)
    {
        $options = get_option($this->option_name);

        echo "<input type='text' name='{$this->option_name}[{$field['id']}]' value='{$options[$field['id']]}' />";
    }

    protected function renderSelect($field)
    {
        $options = get_option($this->option_name);

        echo "<select name='{$this->option_name}[{$field['id']}]'>";
        if(isset($field['options']) && is_array($field['options'])) {
            foreach($field['options'] as $key => $option) {
                echo "<option value='{$key}' " . ($options[$field['id']] == $key ? 'selected' : '') . ">{$option}</option>";
            }
        }
        echo "</select>";
    }

    protected function renderCheckbox($field)
    {
        $options = get_option($this->option_name);

        if(isset($field['options']) && is_array($field['options'])) {
            if(count($field['options']) > 1) {
                $optionField = isset($options[$field['id']]) ? (array) $options[$field['id']] : [];
                $fieldName = "{$this->option_name}[{$field['id']}][]";
            } else {
                $optionField = isset($options[$field['id']]) ? (string) $options[$field['id']] : '';
                $fieldName = "{$this->option_name}[{$field['id']}]";
            }

            foreach($field['options'] as $key => $option) {
                echo "<label><input type='checkbox' name='{$fieldName}' value='{$key}' " . 
                ((is_array($optionField)) ? 
                (in_array($key, $optionField) ? 'checked' : '') : 
                ($optionField == $key ? 'checked' : '')) . ">
                {$option}</label>";
            }
        }
    }

    public function sectionDescription($section)
    {
        echo $section['description'];
    }

    public function validateData($input)
    {
        return $input;
    }
}