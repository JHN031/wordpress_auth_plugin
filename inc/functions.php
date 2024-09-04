<?php


function app_auth_load_assets()
{

    wp_register_style('app_auth_style', APP_AUTH_URL . 'assets/css/auth.css');
    wp_enqueue_style('app_auth_style');

    wp_register_script('app_auth_script', APP_AUTH_URL . 'assets/js/auth.js', ['jquery']);
    wp_enqueue_script('app_auth_script');


}

add_action('wp_enqueue_scripts', 'app_auth_load_assets');