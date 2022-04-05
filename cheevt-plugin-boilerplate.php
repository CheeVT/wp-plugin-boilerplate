<?php

/**
Plugin Name: CheeVT Plugin Boilerplate
Description: Wordpress plugin boilerplate ready for development
Author: CheeVT
Version: 1.0.0
Author URI: https://github.com/CheeVT
*/

if(! defined('ABSPATH')) exit;

use CheeVT\Plugin;

require_once 'vendor/autoload.php';
new Plugin(__FILE__, __DIR__);