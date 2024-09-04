<div class="auth-wrapper">
    <div class="alert" style="display:none;">
        
    </div>
    <div class="register-wrapper">
        <?php if (isset($app_auth_options['register_form_title'])) : ?>
        <h2><?php echo $app_auth_options['register_form_title']; ?></h2>
        <?php endif; ?>
        <form action="" method="post" id="registerForm">

            <div class="form-row">
                <label for="user_first_name">نام :</label>
                <input type="text" name="user_first_name" id="user_first_name"></input>
            </div>
            <div class="form-row">
                <label for="user_last_name">نام خانوادگی :</label>
                <input type="text" name="user_last_name" id="user_last_name"></input>
            </div>
            <div class="form-row">
                <label for="user_email">ایمیل :</label>
                <input type="email" name="user_email" id="user_email"></input>
            </div>
            <div class="form-row">
                <label for="user_password">کلمه عبور :</label>
                <input type="password" name="user_password" id="user_password"></input>
            </div>
            <div class="form-row">
                <button name="submitLogin">ثبت نام</button>
            </div>

        </form>

    </div>

</div>