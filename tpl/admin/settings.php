<div class="wrap">
    <h1>تنظیمات</h1>
    <form method="post">
        <table class="form_table">
            <tr valign= "top">
                <th scope="row">فعال بودن ورود</th>
                <td>
                    <input type="checkbox" name="is_login_active" <?php echo $app_auth_options['is_login_active'] ? 'checked' : ''; ?>/>
                </td>
            </tr>
            <tr valign= "top">
                <th scope="row">فعال بودن ثبت نام</th>
                <td>
                    <input type="checkbox" name="is_register_active" <?php echo $app_auth_options['is_register_active'] ? 'checked' : ''; ?>/>
                </td>
            </tr>
            <tr valign= "top">
                <th scope="row">عنوان فرم ورود</th>
                <td>
                    <input type="text" name="login_form_title" <?php echo isset($app_auth_options['login_form_title']) ? $app_auth_options['login_form_title'] : ''; ?> />
                </td>
            </tr>
            <tr valign= "top">
                <th scope="row">عنوان فرم ثبت نام</th>
                <td>
                    <input type="text" name="register_form_title" <?php echo isset($app_auth_options['register_form_title']) ? $app_auth_options['register_form_title'] : ''; ?> />
                </td>
            </tr>
            <tr valign= "top">
                <th scope="row"> </th>
                <td>
                    <input type="submit" class="button" name="saveData" value="ذخیره سازی"/>
                </td>
            </tr>
        </table>
    </form>
</div>