<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Заполните поля для авторизации</p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="login" placeholder="Ваш email или логин">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="pass" placeholder="Ваш пароль">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <input type="hidden" name="auth_form" value="auth">
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Вход</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->

        <a href="/<?= config_routing('admin-panel') ?>/register" class="text-center">Регистрация</a>

    </div>
    <!-- /.login-box-body -->
</div>