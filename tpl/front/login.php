<div class="auth-wrapper">
    <div class="alert" style="display:none;">

    </div>
    <div class="login-wrapper">
            <?php if (isset($app_auth_options['login_form_title'])) : ?>
            <h2><?php echo $app_auth_options['login_form_title']; ?></h2>
            <?php endif; ?>
        <form action="" method="post" id="loginForm">

            <div class="form-row">
                <label for="userEmail">ایمیل :</label>
                <input type="email" name="userEmail" id="userEmail"></input>
            </div>
            <div class="form-row">
                <label for="userPassword">کلمه عبور :</label>
                <input type="password" name="userPassword" id="userPassword"></input>
            </div>
            <div class="form-row">
                <button name="submitLogin">ورود</button>
            </div>

        </form>

    </div>

</div>