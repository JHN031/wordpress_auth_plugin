<?php

function app_auth_do_login()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $validation_result = app_auth_validate_email_and_password($user_email, $user_password);
    if (!$validation_result['is_valid']) {
        wp_send_json([
            'success' => false,
            'message' =>$validation_result['message']
        ], 403);
    }
    $user = wp_authenticate_email_password(null, $user_email, $user_password);
    if (is_wp_error($user)) {
        wp_send_json([
            'success' => false,
            'message' => 'کاربری با این مشخصات در سیستم یافت نشد'
        ], 403);
    }
    $loginResult = wp_signon([
        'user_login' => $user->user_login,
        'user_password' => $user_password,
        'remember' => false
    ]);
    if (is_wp_error($loginResult)) {
        wp_send_json([
            'success' => false,
            'message' => 'در حال حاضر امکان ورود به سایت وجود ندارد لطفا بعدا امتحان کنید'
        ], 403);
    }
    wp_send_json([
        'success' => true,
        'message' => 'عملیات ورود با موفقیت انجام شد'
    ], 200);
}
function app_auth_validate_email_and_password($email, $password)
{
    $result = [
        'is_valid' => true,
        'message' => ""
    ];
    if (is_null($email) || empty($email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل نمی تواند خالی باشد';
        return $result;
    }
    if (is_null($password) || empty($password)) {
        $result['is_valid'] = false;
        $result['message'] = 'کلمه عبور نمی تواند خالی باشد';
        return $result;
    }
    if (!is_email($email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل وارد شده معتبر نمی باشد';
        return $result;
    }

    return $result;

}

function app_auth_do_register()
{
    $user_first_name = sanitize_text_field($_POST['user_first_name']);
    $user_last_name = sanitize_text_field($_POST['user_last_name']);
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);

    $validateResult = validate_register_request($user_first_name, $user_last_name, $user_email, $user_password);
    if (!$validateResult['is_valid']) {
        wp_send_json([
            'success' => false,
            'message' => $validateResult['message']
        ], 422);
    }


    $userEmailParts = explode('@', $user_email);
    $newUser = wp_insert_user([
        'user_login' => apply_filters('pre_user_login', $userEmailParts[0] . rand(1000, 9999)),
        'user_pass' => apply_filters('pre_user_pass', $user_password),
        'user_email' => apply_filters('pre_user_email', $user_email),
        'first_name' => apply_filters('pre_user_first_name', $user_first_name),
        'last_name' => apply_filters('pre_user_last_name', $user_last_name),
        'display_name' => apply_filters('pre_user_display_name', "{$user_first_name} {$user_last_name}")
    ]);

if(is_wp_error($newUser)) {
    wp_send_json(
        [
            'success' => false,
            'message' => 'خطایی در ثبت نام شما رخ داده است'
        ],
        500
    );
}
wp_send_json(
    [
        'success' => true,
        'message' => 'ثبت نام شما با موفقیت انجام شد'
    ],
    200
);
}

function validate_register_request($first_name, $last_name, $email, $password)
{
    $result= [
        'is_valid' => true,
        'message' => ""
    ];

    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)) {

        $result['is_valid'] = false;
        $result['message'] = "تمامی فیلدها الزامی می باشد";
        return $result;
    }
    
    if(!is_email($email)) {

        $result['is_valid'] = false;
        $result['message'] = "ایمیل وارد شده معتبر نمی باشد";
        return $result;
    }
    
    if(email_exists($email)) {

        $result['is_valid'] = false;
        $result['message'] = "این آدرس ایمیل در دسترس نمی باشد";
        return $result;
    }


    return $result;
}

add_action('wp_ajax_nopriv_app_auth_login' , 'app_auth_do_login');
add_action('wp_ajax_nopriv_app_auth_register' , 'app_auth_do_register');



