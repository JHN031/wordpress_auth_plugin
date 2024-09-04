jQuery(document).ready(function ($) {

    $('#loginForm').on('submit', function (event) {

        event.preventDefault();
        let user_email = $('#userEmail').val();
        let user_password = $('#userPassword').val();
        let notify = $('.alert');
        $.ajax({
            url: '/wordpress/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'app_auth_login',
                user_email: user_email,
                user_password: user_password

        },
        success: function (response) {
            if (response.success) {
                notify.removeClass('alert-error').addClass('alert-success');
                notify.html('<p>' + response.message + '</p>');
                notify.show(300);
                setTimeout(function () {
                    window.location.href = '/wordpress/';
                }, 2000);
            }
        },
        error: function (error) {
            if (error) {
                let message = error.responseJSON.message;

                notify.addClass('alert-error');
                notify.append('<p>' + message + '</P>');
                notify.show();
                notify.delay(2000).hide(300);
            }
        }
    });

 });



$('#registerForm').on('submit', function (event) {

    event.preventDefault();
    let first_name = $('#user_first_name').val();
    let last_name = $('#user_last_name').val();
    let user_email = $('#user_email').val();
    let user_password = $('#user_password').val();
    let notify = $('.alert');

    $.ajax({
        url: '/wordpress/wp-admin/admin-ajax.php',
        type: 'post',
        datatype: 'json',
        data: {
            action: 'app_auth_register',
            user_first_name: first_name,
            user_last_name: last_name,
            user_email: user_email,
            user_password: user_password,

        },
        success: function (response) {
            if (response.success) {
                notify.removeClass('alert-error').addClass('alert-success');
                notify.html('<p>' + response.message + '</p>');
                notify.show(300);
                setTimeout(function () {
                    window.location.href = '/wordpress/login';
                }, 2000);
            }
        },
        error: function (error) {
            if (error) {
                let message = error.responseJSON.message;

                notify.addClass('alert-error');
                notify.append('<p>' + message + '</P>');
                notify.show();
                notify.delay(2000).hide(300);
            }
        }
    });

 });
});