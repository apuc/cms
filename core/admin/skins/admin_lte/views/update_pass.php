<?php
/**
 * @var $update
 */
?>
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <p>Старый пароль</p>
                <input type="password" class="form-control" name="pass_old" placeholder="" value="<?= $update['pass_old'] ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <p>Новый пароль</p>
                <input type="password" class="form-control" name="pass_new" placeholder="" value="<?= $update['pass_new'] ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <input type="hidden" name="auth_form" value="auth">
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="<?= $update['user_id'] ?>">Сохранить</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>