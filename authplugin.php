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
function auth_plugin_install_default_configs()
{
    $current_configs = get_option('auth_plugin_configs');
    if (!$current_configs) {
        $default_configs = [
            'amount' => 50000,
            'role' => 'administrator'
        ];
        update_option('auth_plugin_configs' , $default_configs);
    }
}
// function auth_plugin_install_db()
// {
//     global $wpdb;
//     $customers_table_name = $wpdb->prefix . 'customers';
//     $collate = $wpdb->get_charset_collate();
//     $customers_table_sql = "
//         CREATE TABLE '{$}'
//     ";
// }
function auth_plugin_unistall()
{
    delete_option('auth_plugin_configs');
}
function auth_plugin_activate()
{
    auth_plugin_install_default_configs();
    register_uninstall_hook(__FILE__,'auth_plugin_unistall');
}

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