<?php


function app_auth_login_handler($atts, $content = null)
{
    $app_auth_options = get_option('app_auth_options', []);

    if (isset($app_auth_options['is_login_active']) && !$app_auth_options['is_login_active']) {
        return '<div><p>امکان ورود در حال حاضر وجود ندارد</p></div>';
    }
    
    include APP_AUTH_TPL . "front/login.php";
}

function app_auth_register_handler($atts, $content = null)
{
    $app_auth_options = get_option('app_auth_options', []);
    if (isset($app_auth_options['is_register_active']) && !$app_auth_options['is_register_active']) {
        return '<div><p>امکان ثبت نام در حال حاضر وجود ندارد</p></div>';
    }
    include APP_AUTH_TPL . "front/register.php";
}

add_shortcode('app_auth_login', 'app_auth_login_handler');
add_shortcode('app_auth_register', 'app_auth_register_handler');