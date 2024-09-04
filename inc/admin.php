<?php
function app_auth_admin_settings()
{

    add_menu_page('ورود و ثبت نام', 'ورود و ثبت نام', 'manage_options', 'app_auth', 'app_auth_settings');
}
function app_auth_settings()
{
    $app_auth_options = get_option('app_auth_options', []);


    if (isset($_POST['saveData'])) {

        
        $app_auth_options['is_login_active'] = isset($_POST['is_login_active']);
        $app_auth_options['is_register_active'] = isset($_POST['is_register_active']);
        $app_auth_options['login_form_title'] = sanitize_text_field($_POST['login_form_title']);
        $app_auth_options['register_form_title'] = sanitize_text_field($_POST['register_form_title']);

        update_option('app_auth_options', $app_auth_options);
    }
    include APP_AUTH_TPL . "admin/settings.php";
}
add_action('admin_menu' , 'app_auth_admin_settings');
