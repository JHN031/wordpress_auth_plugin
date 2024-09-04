<?php
/*
Plugin Name: Auth Plugin
Plugin URI: https://www.JHN.com/
Description: wordpress plugin to manage auth 
Author: Javad Hamashbouri
Author URI: https://www.JHN.com/
Text Domain: auth_plugin
Domain Path: /languages/
Version: 1.0.0
 */

define('APP_AUTH_DIR', plugin_dir_path(__FILE__));
define('APP_AUTH_URL', plugin_dir_url(__FILE__));
define('APP_AUTH_INC', APP_AUTH_DIR . '/inc/');
define('APP_AUTH_TPL', APP_AUTH_DIR . '/tpl/');

include APP_AUTH_INC . "functions.php";
include APP_AUTH_INC . "shortcodes.php";
include APP_AUTH_INC . "ajax.php";
if (is_admin()) {
    include APP_AUTH_INC . "admin.php";
}