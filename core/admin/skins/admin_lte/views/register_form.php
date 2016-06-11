<div class="register-box">
    <div class="register-box-body">
        <p class="login-box-msg">Регистрация нового пользователя</p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="login" class="form-control" placeholder="Ваш логин">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email"  name="email" class="form-control" placeholder="Ваш email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                <span class="glyphicon glyphicon-ok-sign form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="pass" class="form-control" placeholder="Пароль">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-7">

                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Регистрация</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="/<?= config_routing('admin-panel') ?>/auth" class="text-center">Вход</a>
    </div>
</div>
